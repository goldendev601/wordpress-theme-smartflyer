<?php get_header(); ?>


<?php
$args = array('posts_per_page' => 1);
$exclude = array();


$term_lm = 'blog';
$type_lm = 'blog';
$post_counter = 0;
if (!is_page('stories')) {
	$term = get_queried_object();
	$useterm = true;
	$term_lm = $term->slug;
	$type_lm = 'archive';
	$args['tax_query'] 	= array(
		array(
			'taxonomy' => $term->taxonomy,
			'field' => 'slug',
			'terms' => $term->slug
		)
	);
} else {
	$blog = $post;
}
$posts = get_posts($args);
?>

<?php if (is_page('stories')) : ?>
	<?php $post = $posts[0];
	$exclude[] = $post->ID; ?>
	<?php $post_counter++; ?>
	<div class='posts-hero'>
		<div class='hero-left'>
			<?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '720x720'); ?>
			<a href='<?php echo get_permalink($post->ID); ?>' class="link-me"><img src="<?php echo $featured; ?>"></a>
		</div>
		<div class='hero-right'>
			<?php if (isset($useterm)) : ?>
				<?php $category = $term; ?>
			<?php else : ?>
				<?php $category = get_the_category($post->ID);
				$category = $category[0]; ?>
			<?php endif; ?>
			<a href="<?php echo get_term_link($category); ?>"><span><?php echo $category->name; ?></span></a>
			<h2><a href='<?php echo get_permalink($post->ID); ?>' class="link-me"><?php echo $post->post_title; ?></a></h2>
			<p><?php echo smartflyer_excerpt($post->post_content, 20, false); ?></p>
			<a href='<?php echo get_permalink($post->ID); ?>' class="link-me">Read More <svg class='arrow-right'>
					<use xlink:href="#arrow-right"></use>
				</svg></a>
		</div>
	</div>
<?php endif; ?>

<div class='posts-categories category-landing'>
	<?php $categories = get_categories(); ?>
	<?php foreach ($categories as $cat) : ?>
		<a href='<?php echo get_term_link($cat); ?>' <?php if ($term->term_id == $cat->term_id) : ?>class='active' <?php endif; ?>><?php echo $cat->name; ?></a>
	<?php endforeach; ?>
	<div class='mob-categories'>
		<?php if (!is_page('stories')) : ?>
			<a href='<?php echo get_term_link($term); ?>' class='active'><?php echo $term->name; ?> <svg class='arrow-down'>
					<use xlink:href="#arrow-down"></use>
				</svg></a>
			<?php $categories = get_categories(); ?>
		<?php else : ?>
			<a href='<?php echo home_url('/stories'); ?>' class='active'>Categories <svg class='arrow-down'>
					<use xlink:href="#arrow-down"></use>
				</svg></a>
		<?php endif; ?>
		<div class='dd'>
			<?php foreach ($categories as $cat) : ?>
				<?php if (!is_page('stories')) : ?>
					<?php if ($term->term_id != $cat->term_id) : ?>
						<a href='<?php echo get_term_link($cat); ?>'><?php echo $cat->name; ?></a>
					<?php endif; ?>
				<?php else : ?>
					<a href='<?php echo get_term_link($cat); ?>'><?php echo $cat->name; ?></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>


<?php if (is_page('stories')) : ?>
	<h2 class='blog-excerpt'><?php echo $blog->post_content; ?></h2>
<?php else : ?>

<?php endif; ?>


<?php
$args['posts_per_page'] = 3;
$args['exclude'] = $exclude;
$posts = get_posts($args);
?>
<div class='wrapper min'>
	<?php foreach ($posts as $post) : ?>
		<?php $exclude[] = $post->ID; ?>
		<?php $post_counter++; ?>
		<?php include('_objects/post-alt.php'); ?>
	<?php endforeach; ?>
</div>


<?php if (is_page('stories')) : ?>
	<?php $posts = smartflyer_popular($exclude); ?>
	<div class='posts-popular'>
		<div class='wrapper'>
			<h2 class='line'>Popular</h2>
			<div class='just-wrap'>
				<?php foreach ($posts as $post) : ?>
					<?php $exclude[] = $post->ID; ?>
					<?php include('_objects/3-col-post.php'); ?>
				<?php endforeach; ?>
				<div class='post col-3 placeholder'></div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php
if (is_page('stories'))
	$args['posts_per_page'] = 6;
else
	$args['posts_per_page'] = 3;
$args['exclude'] = $exclude;
$posts = get_posts($args);

?>
<div class='posts-load'>
	<div class='wrapper'>
		<div class='just-wrap last'>
			<?php foreach ($posts as $post) : ?>
				<?php $exclude[] = $post->ID; ?>
				<?php $post_counter++; ?>
				<?php include('_objects/3-col-post.php'); ?>
			<?php endforeach; ?>
			<div class='post col-3 placeholder'></div>
		</div>


		<?php
		$args['posts_per_page'] = -1;
		$args['exclude'] = $exclude;
		$posts = get_posts($args);
		?>
		<?php if (count($posts) > 0) : ?>
			<span class='load-more get-archive' data-paged="1" data-type="<?php echo $type_lm; ?>" data-term="<?php echo $term_lm; ?>" data-exclude='<?php echo implode(',', $exclude); ?>'>
				<span class="load-more-text">Load More</span> <svg class='arrow-down'>
					<use xlink:href="#arrow-down"></use>
				</svg>
			</span>
		<?php endif; ?>
	</div>
</div>

<?php
if (!is_page('stories')) {
	include('_objects/social-footer.php');	
}
?>

<?php get_footer(); ?>