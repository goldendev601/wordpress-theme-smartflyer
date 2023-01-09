<?php /* Template Name: HQ Team */ ?>
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


<?php
$args_mngt = array(
    'post_type'    		=>  'team',
    'posts_per_page'    =>  -1,
    'orderby' => 'menu_order',
		'order' => 'ASC',
);
$mngt_posts = get_posts($args_mngt);
?>

<div class='hq-team wrapper'>
	<div class='hq-team__featured'>
		<?php $post = $mngt_posts[0]; ?>
		<div class='hq-team__member'>
			<?php
		    $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '352x352');
		    if($featured)
		      $image = $featured;
		    else
		      $image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
			?>
			<a href="<?php echo get_permalink($post->ID); ?>" class='img-wrap'><img class="" src="<?php echo $image; ?>"></a>
			<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h3>
			<?php if (get_post_meta($post->ID, '_agent_title', true)): ?>
				<small><?php echo get_post_meta($post->ID, '_agent_title', true); ?></small>
			<?php endif; ?>
			<div class='socials'>
				<a href='<?php echo get_permalink($post->ID); ?>'>Full Bio</a>
				<?php if (get_post_meta($post->ID, '_agent_facebook', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_facebook', true); ?>'><svg class='fb'><use xlink:href="#fb"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_linkedin', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_linkedin', true); ?>'><svg class='in'><use xlink:href="#in"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_instagram', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_instagram', true); ?>'><svg class='ig'><use xlink:href="#ig"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_email', true)): ?>
				<a target='_blank' href='mailto:<?php echo get_post_meta($post->ID, '_agent_email', true); ?>'>Email</a>
				<?php endif; ?>
			</div>
		</div>
		<?php array_shift($mngt_posts); ?>
		<?php $post = $mngt_posts[0]; ?>
		<div class='hq-team__member'>
			<?php
		    $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '352x352');
		    if($featured)
		      $image = $featured;
		    else
		      $image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
			?>
			<a href="<?php echo get_permalink($post->ID); ?>" class='img-wrap'><img class="" src="<?php echo $image; ?>"></a>
			<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h3>
			<?php if (get_post_meta($post->ID, '_agent_title', true)): ?>
				<small><?php echo get_post_meta($post->ID, '_agent_title', true); ?></small>
			<?php endif; ?>
			<div class='socials'>
				<a href='<?php echo get_permalink($post->ID); ?>'>Full Bio</a>
				<?php if (get_post_meta($post->ID, '_agent_facebook', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_facebook', true); ?>'><svg class='fb'><use xlink:href="#fb"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_linkedin', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_linkedin', true); ?>'><svg class='in'><use xlink:href="#in"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_instagram', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_instagram', true); ?>'><svg class='ig'><use xlink:href="#ig"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_email', true)): ?>
				<a target='_blank' href='mailto:<?php echo get_post_meta($post->ID, '_agent_email', true); ?>'>Email</a>
				<?php endif; ?>
			</div>
		</div>
		<?php array_shift($mngt_posts); ?>
	</div>
	<div class='hq-team__grid'>

		<?php foreach ($mngt_posts as $post): ?>
		<div class='hq-team__member'>
			<?php
		    $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '352x352');
		    if($featured)
		      $image = $featured;
		    else
		      $image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
			?>
			<a href="<?php echo get_permalink($post->ID); ?>" class='img-wrap'><img class="" src="<?php echo $image; ?>"></a>
			<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h3>
			<?php if (get_post_meta($post->ID, '_agent_title', true)): ?>
				<small><?php echo get_post_meta($post->ID, '_agent_title', true); ?></small>
			<?php endif; ?>
			<div class='socials'>
				<a href='<?php echo get_permalink($post->ID); ?>'>Full Bio</a>
				<?php if (get_post_meta($post->ID, '_agent_facebook', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_facebook', true); ?>'><svg class='fb'><use xlink:href="#fb"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_linkedin', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_linkedin', true); ?>'><svg class='in'><use xlink:href="#in"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_instagram', true)): ?>
				<a target='_blank' href='<?php echo get_post_meta($post->ID, '_agent_instagram', true); ?>'><svg class='ig'><use xlink:href="#ig"></use></svg></a>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, '_agent_email', true)): ?>
				<a target='_blank' href='mailto:<?php echo get_post_meta($post->ID, '_agent_email', true); ?>'>Email</a>
				<?php endif; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<div class='wrapper'>
	<div class='team-join-cta'>
		<h2><a href='<?php echo  exsite_get_option('join_team_link'); ?>'><?php echo  exsite_get_option('join_team_title'); ?> <svg class='arrow-right-large'><use xlink:href="#arrow-right-large"></use></svg></a></h2>
		<p><?php echo  exsite_get_option('join_team_subhead'); ?></p>
	</div>
</div>


<?php get_footer(); ?>