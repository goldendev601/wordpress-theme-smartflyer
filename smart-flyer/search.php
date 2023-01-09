<?php get_header(); ?>

<?php
	
	$search_term = urldecode(get_query_var('s'));
	$posts_to_show = -1;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	    'posts_per_page'    => $posts_to_show,
	    's'					=> $search_term,
	    'post_type'			=> array( 'post', 'page', 'review', 'agent', 'team' )
	);
	$posts = get_posts(  $args );


    $exclude = array();
    foreach($posts as $post)
        $exclude[] = $post->ID;

    $has_team = false;
    $posts_to_add = array();
    foreach($posts as $post){

        if($post->post_type == 'team')
            $has_team = true;

        if($post->post_type == 'agent' || $post->post_type == 'team') {
            $args = array(
                'posts_per_page'   => -1,
                'exclude'   => $exclude,
                'meta_query' => array(
                    array(
                        'key' => '_post_agent',
                        'compare' => 'LIKE',
                        'value' => $post->ID,
                    )
                ),
            );
            $teams_posts = get_posts( $args );
            foreach($teams_posts as $teams_post)
                $exclude[] = $teams_post->ID;
            $posts_to_add = array_merge($posts_to_add, $teams_posts);
        }
    }
    $posts = array_merge($posts, $posts_to_add);

    if($has_team) {
        $hq_page = get_post(28504);
        array_unshift($posts, $hq_page);
    }

?>

<div class='posts-categories category-landing'>
	<h2><?php if(!$posts): ?>No results for:<?php else: ?>Results for:<?php endif; ?> <?php echo $search_term; ?></h2>
</div>


<div class='posts-load'>
	<div class='wrapper'>
		<div class='just-wrap'>
			<?php foreach($posts as $post): ?>
			<div class='post col-3 whole-click'>
                <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
				<img src="<?php echo $featured; ?>">
				<?php 
					$type = 'Stories';
					if($post->post_type == 'review')
						$type = 'Review';
					if($post->post_type == 'agent')
						$type = 'Team';
                    if($post->post_type == 'team')
                        $type = 'HQ Team';
					if($post->post_type == 'page')
						$type = 'SmartFlyer';
				?>
				<span><?php echo $type; ?></span>
				<a href='<?php echo get_permalink($post->ID); ?>' class="link-me"><h2><?php echo $post->post_title; ?></h2></a>
				<?php if($post->post_type == 'review'): ?>
				<p><?php echo get_post_meta($post->ID, '_review_quote', true); ?></p>
				<?php else: ?>
				<p><?php echo smartflyer_excerpt($post->post_content, 20, false); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>

            <?php /*
            <?php foreach($users as $user): ?>
                <div class='post col-3 whole-click'>
                    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>">
                    <span>Author</span>
                    <a href='<?php echo get_author_posts_url($user->ID); ?>' class="link-me">
                        <h2><?php echo $user->display_name; ?></h2>
                    </a>
                </div>
            <?php endforeach; ?>
 */ ?>
		</div>
		<!--<span class='load-more'>Load More <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg></span>-->
	</div>
</div>

<!-- <?php include('_objects/social-footer.php'); ?> -->


<?php get_footer(); ?>