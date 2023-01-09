<?php 
add_filter('body_class', 'explore_body_classes');
function explore_body_classes($classes)
{
   $classes[] = 'explore-page';
   return $classes;
}
?>

<?php get_header(); ?>

<?php 
	
$args = array(
	'post_type'    =>  'biopost',
	'posts_per_page'    => -1
);

$bioposts = get_posts($args); 

?>

<div class='explore-main'>
	<div class='wrapper'>
		<div class='explore-grid'>
		<p><?php echo exsite_get_option('explore_text'); ?></p>
			<?php foreach($bioposts as $biopost): ?>
			<a href='<?php echo get_post_meta( $biopost->ID, '_biopost_link', true ); ?>'>
                <?php $featured = exsite_image_resize(get_post_thumbnail_id($biopost->ID), '400x400');
                $featured = wp_get_attachment_url( get_post_thumbnail_id($biopost->ID), 'thumbnail' ); ?>
				<img src="<?php echo $featured; ?>">
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>