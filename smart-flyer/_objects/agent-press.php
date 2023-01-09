<?php
$press_link = get_post_meta(get_the_ID(), '_press_link', true);
$parse = parse_url($press_link);
$press_domain = $parse['host'];
$url = "https://logo.clearbit.com/" . $press_domain;
$file_headers = @get_headers($url);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}
?>
<li>
    <?php
        if (get_post_meta(get_the_ID(), '_press_image_white', true)) {
    ?>
        <div>
            <a href="<?php echo get_post_meta(get_the_ID(), '_press_link', true); ?>">
                <img src="<?php echo get_post_meta(get_the_ID(), '_press_image_white', true); ?>" />
            </a>
        </div>
    <?php
        } else {
    ?>
        <div>
            <a href="<?php echo get_post_meta(get_the_ID(), '_press_link', true); ?>">
                <?php if($exists) { ?>
                    <img src="https://logo.clearbit.com/<?php echo $press_domain; ?>" />
                <?php } else { ?>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/press/press-default-icon.png" />
                <?php } ?>
            </a>
        </div>
    <?php
        }
    ?>
    <h5><a href="<?php echo get_post_meta(get_the_ID(), '_press_link', true); ?>"><?php the_title(); ?></h5></a>
</li>