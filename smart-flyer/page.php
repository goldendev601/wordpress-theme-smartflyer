<?php get_header(); ?>

<?php 	
if($post->post_parent == 0)
	$parent = $post;
else
	$parent = get_post($post->post_parent);
$args = array( 'posts_per_page' => -1, 'post_type' => 'page', 'post_parent' => $parent->ID, 'orderby' => 'menu_order', 'order' => 'ASC' );
$children = get_posts(  $args );
?>

<?php if($children): ?>
<div class='posts-categories'>
	<a href='<?php echo get_permalink($parent->ID); ?>' <?php if($post->ID == $parent->ID): ?>class='active'<?php endif; ?>><?php echo $parent->post_title; ?></a>
	<?php $categories = get_categories(); ?>
	<?php foreach($children as $child): ?>
	<a href='<?php echo get_permalink($child->ID); ?>' <?php if($post->ID == $child->ID): ?>class='active'<?php endif; ?>><?php echo $child->post_title; ?></a>
	<?php endforeach; ?>
	
	<div class='mob-categories'>
		<a href='<?php echo get_permalink($post->ID); ?>' class='active'><?php echo $post->post_title; ?> <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg></a>
		<?php $categories = get_categories(); ?>
		<div class='dd'>
		
		<?php if($post->ID != $parent->ID): ?>
		<a href='<?php echo get_permalink($parent->ID); ?>' <?php if($post->ID == $parent->ID): ?>class='active'<?php endif; ?>><?php echo $parent->post_title; ?></a>
		<?php endif; ?>
		
		<?php foreach($children as $child): ?>
		<?php if($post->ID != $child->ID): ?>
		<a href='<?php echo get_permalink($child->ID); ?>' <?php if($post->ID == $child->ID): ?>class='active'<?php endif; ?>><?php echo $child->post_title; ?></a>
		<?php endif; ?>
		<?php endforeach; ?>
		
		</div>
	</div>
	
</div>
<?php endif; ?>



<?php $featured_id = get_post_thumbnail_id($post->ID); ?>

<?php if($featured_id): ?>
<?php $featured = exsite_image_resize($featured_id, '1080x0', false); ?>
<div class='reviews-hero' style="background-image: url('<?php echo $featured; ?>')">
	<h2><?php echo $post->post_title; ?></h2>
	<?php if($subtitle =  get_post_meta($post->ID, '_page_subtitle', true)): ?>
	<h3><?php echo $subtitle; ?></h3>
	<?php endif; ?>
</div>
<?php endif; ?>

<article>
	<?php if(!$featured_id): ?>
	<div class='article-intro page'>
		<h1><?php echo $post->post_title; ?></h1>
		<?php if($subtitle =  get_post_meta($post->ID, '_page_subtitle', true)): ?>
		<h3><?php echo $subtitle; ?></h3>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<div class='article-content'>
		<?php echo smartflyer_images_check(apply_filters('the_content', $post->post_content)); ?>
	</div>
</article>
<?php get_footer(); ?>