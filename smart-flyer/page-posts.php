<?php get_header(); ?>

<?php
	$agent_id = get_query_var('agent_id');
	$agent = get_page_by_path( $agent_id, OBJECT, 'agent' );
?>

<?php 
$term = get_queried_object();
$args = array( 'posts_per_page' => 9, 'meta_key' => '_post_agent', 'meta_value' => $agent->ID);
$posts = get_posts(  $args );
?>


<div class='posts-categories category-landing'>
	<a href='/posts/<?php echo $agent->post_name; ?>' >
		<?php echo $agent->post_title; ?>
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
		<div class='just-wrap'>
			<?php for($x=3;  $x<9; $x++): ?>
			<?php $post = $posts[$x]; ?>
			<?php include('_objects/3-col-post.php'); ?>
			<?php endfor; ?>
		</div>
		<?php if(count($posts) >= 9): ?>
		<span class='load-more get-archive' data-paged="1" data-type="agent" data-term="<?php echo $agent->ID; ?>">
			<span class="load-more-text">Load More</span> <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg>
		</span>
		<?php endif; ?>
	</div>
</div>

<?php include('_objects/social-footer.php'); ?>


<?php get_footer(); ?>