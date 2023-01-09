<?php get_header(); ?>

<?php 
$term = get_queried_object();
$args = array( 'posts_per_page' => 9, 'author' => $term->data->ID);
$posts = get_posts(  $args );
?>


<div class='posts-categories category-landing'>
	<a href='<?php echo get_author_posts_url( $term->data->ID ); ?>' >
		<?php echo get_user_meta($term->data->ID, 'first_name', true); ?> <?php echo get_user_meta($term->data->ID, 'last_name', true); ?>
	</a>
</div>


<div class='wrapper min'>
	<?php for($x=0;  $x<3; $x++): ?>
	<?php $post = $posts[$x]; ?>
	<?php include('_objects/post-alt.php'); ?>
	<?php endfor; ?>
</div>


<div class='posts-load'>
	<div class='wrapper'>
		<div class='just-wrap last'>
			<?php for($x=3;  $x<9; $x++): ?>
			<?php $post = $posts[$x]; ?>
			<?php include('_objects/3-col-post.php'); ?>
			<?php endfor; ?>
		</div>
		<?php if(count($posts) >= 9): ?>
		<span class='load-more get-archive' data-paged="1" data-type="author" data-term="<?php echo $term->data->ID; ?>">
			<span class="load-more-text">Load More</span> <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg>
		</span>
		<?php endif; ?>
	</div>
</div>

<?php include('_objects/social-footer.php'); ?>


<?php get_footer(); ?>