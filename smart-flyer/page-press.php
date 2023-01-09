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
<?php $featured = exsite_image_resize($featured_id, '1512x377'); ?>
<div class='reviews-hero press' <?php if($featured): ?>style="background-image: url('<?php echo $featured; ?>')"<?php endif; ?>>
	<h2><?php echo $post->post_title; ?></h2>
	<?php if($subtitle =  get_post_meta($post->ID, '_page_subtitle', true)): ?>
	<h3><?php echo $subtitle; ?></h3>
	<?php endif; ?>
</div>


<?php
$args = array(
    'post_type'    =>  'press',
    'posts_per_page'    =>  -1,
    'orderby'          => 'meta_value',
    'meta_key'          => '_press_date',
	'order'            => 'DESC',
);
$posts = get_posts(  $args );
?>	
<div class='reviews-list'>
	<div class='wrapper'>
		<div class='reviews-main'>
			<?php foreach($posts as $post): ?>
			
			<?php 
				$whole_click_class = 'whole-click';
				$link = get_post_meta($post->ID, '_press_link', true); 
				$image_link = get_post_meta($post->ID, '_press_img_link_id', true);
				if($image_link)
				{
					$whole_click_class = 'whole-click-press-image';
                    $image_link = exsite_image_resize($image_link, '1800x0', false);
					$link = $image_link;
				}
			?>
			
			<div class='press-item <?php echo $whole_click_class; ?>'>
				<?php $featured = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
				<div class='img-wrap'><img src="<?php echo $featured[0]; ?>"></div>
				<h2><?php echo $post->post_title; ?></h2>
				<h3><a href='<?php echo $link; ?>' target="_blank"><?php echo get_post_meta($post->ID, '_press_company', true); ?></a></h3>
				<span><?php echo date('M. Y', get_post_meta($post->ID, '_press_date', true)); ?></span>
			</div>
			<?php endforeach; ?>
			<div class='press-item placeholder'></div>
			<div class='press-item placeholder'></div>
			<div class='press-item placeholder'></div>
			<div class='press-item placeholder'></div>
			<div class='press-item placeholder'></div>
		</div>
		<!--<span class='load-more'>Load More <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg></span>-->
	</div>
</div>


<div class='agent-lightbox press'>
	<span class='lb-close-trigger'><svg class='lb-close'><use xlink:href="#lb-close"></use></svg></span>
	<img id='press-image' src=''>
</div>

<?php get_footer(); ?>