<?php get_header(); ?>

<div class='planner'>
<div class='planner-wrap'>
<h1><?php echo the_title(); ?></h1>

<?php echo smartflyer_images_check(apply_filters('the_content', $post->post_content)); ?>

</div>
</div>

<?php get_footer(); ?>