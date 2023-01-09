<?php

function exsite_image_resize( $attachment_id, $size, $crop = true )
{

    if($attachment_id == '')
        return '';

    $size_new = $size;
    $size = explode('x', $size);
    $width = $size[0];
    $ret_width = $size[0]*2;
    $height = $size[1];
    $ret_height = $size[1]*2;

    $upload = wp_upload_dir();

    if($height == "0")
        $crop = false;


    $path = get_attached_file( $attachment_id );
    $path_info = pathinfo( $path );
    $base_url  = $upload['baseurl'] . str_replace( $upload['basedir'], '', $path_info['dirname'] );
    $base_path  = $upload['basedir'] . str_replace( $upload['basedir'], '', $path_info['dirname'] );
    $meta = wp_get_attachment_metadata( $attachment_id );


    //Check if retina exists
    $retina_exists = false;

    //Check if retina can be created
    if($meta['width'] >= $ret_width && $meta['height'] >= $ret_height)
    {
        foreach ( $meta['sizes'] as $key => $size )
        {
            if($key == 'resized-'.$ret_width.'x'.$ret_height)
            {
                $retina_exists = true;
                break;
            }
        }
    }
    else
    {
        $retina_exists = true;
    }

    //Check if original exists
    $orginal_exists = false;
    foreach ( $meta['sizes'] as $key => $size )
    {
        if($key == 'resized-'.$width.'x'.$height)
        {
            $orig_image = "{$base_url}/{$size['file']}";
            $orginal_exists = true;
        }
    }

    if(!checkRemoteFile($orig_image))
        $orginal_exists = false;


    //If none exists - Check to make sure original is on server.
    if(!$retina_exists || !$orginal_exists)
    {
        //If file doesn't exist, copy over
        if ( ! file_exists( $path ) && $path != '' )
        {
            $whereto = str_replace($upload['basedir'], '', $path);

            $file_name = explode('/', $whereto);
            $file_name = $file_name[3];
            $whereto = str_replace($file_name, '', $path);

            if(!file_exists($whereto))
                mkdir($whereto, 0777, true);

            $image = wp_get_attachment_image_src( $attachment_id, $size_new );

            if($image)
            {
                $content = file_get_contents($image[0]);
                $path_new = $whereto.$file_name;
                $fp = fopen($path_new, "w");
                fwrite($fp, $content);
                fclose($fp);
            }
        }
    }
    else
    {
        return $orig_image;
    }


    if(!$retina_exists)
    {
        $new_path = explode('.',$path);
        $new_path = $new_path[0].'@2x.'.$new_path[1];
        $resized = image_make_intermediate_size( $path, $ret_width, $ret_height, $crop );
        if ( $resized && ! is_wp_error( $resized ) )
        {
            $new_hw = $resized['width'].'x'.$resized['height'];
            $rename_hw = floor($resized['width']/2).'x'.floor($resized['height']/2);
            $resized_file = str_replace($new_hw, $rename_hw, $resized['file']);
            $new_path = explode('.',$resized_file);
            $new_path = $base_path.'/'.$new_path[0].'@2x.'.$new_path[1];
            $did_it = rename( $base_path.'/'.$resized['file'], $new_path );
            $key                 = sprintf( 'resized-%dx%d', $ret_width, $ret_height );
            $meta['sizes'][$key] = $resized;
            wp_update_attachment_metadata( $attachment_id, $meta );
        }
    }


    if(!$orginal_exists)
    {
        $resized = image_make_intermediate_size( $path, $width, $height, $crop );
        if ( $resized && ! is_wp_error( $resized ) )
        {
            $key                 = sprintf( 'resized-%dx%d', $width, $height );
            $meta['sizes'][$key] = $resized;
            wp_update_attachment_metadata( $attachment_id, $meta );
            return "{$base_url}/{$resized['file']}";
        }
    }
    else
    {
        return $orig_image;
    }

    // Return original if fails
    return "{$base_url}/{$path_info['basename']}";

}

function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}