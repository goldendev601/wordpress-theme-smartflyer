<?php get_header(); ?>


<?php
$filter = false;
$args = array(
    'post_type'    =>  'review',
	'post_status' => 'publish',
    'posts_per_page'    => 17
);
$sort = "date";

$region_label = 'Region';
$style_label = 'Style';
$styles = array();
$exclude = array();



//Filter on Region
if(isset($_GET['region']))
{
	$filter = true;
	$args['tax_query'][] = array(
									'taxonomy' => 'review_region',
									'field' => 'slug',
									'terms' => $_GET['region']
								);
	
	$region_label = str_replace('-', ' ', $_GET['region']);
}


//Filter on style
if(isset($_GET['style']))
{
	$filter = true;
	$styles = explode("-", $_GET['style']);
	
	foreach($styles as $style)
	{
		$args['tax_query'][] = array(
									'taxonomy' => 'review_style',
									'field' => 'slug',
									'terms' => $style
								);
	}
}

if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
	$filter = true;
	
	if($sort == 'alpha')
	{
		$args['orderby'] = 'title';	
		$args['order'] = 'ASC';
	}
}


$posts = get_posts(  $args );
?>	



<?php $featured_id = get_post_thumbnail_id($post->ID); ?>
<?php $featured = exsite_image_resize($featured_id, '1512x377'); ?>


<?php include('_objects/reviews-filter.php'); ?>


<?php if(!$filter): ?>
<div class='reviews-main'>
	<div class='wrapper'>
		
		<?php $post = $posts[0]; ?>
		<?php $exclude[] = $post->ID; ?>
		<div class='review-full'>
            <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '709x397'); ?>
			<a href='<?php echo get_permalink($post->ID); ?>' class='review-full-featured'>
				<img src="<?php echo $featured; ?>">
			</a>
			<div class='review-full-content'>
				<a href='<?php echo get_permalink($post->ID); ?>'><h2><?php echo $post->post_title; ?></h2></a>
				<small><?php echo get_post_meta($post->ID, '_review_place', true); ?></small>
				<p><?php echo get_post_meta($post->ID, '_review_quote', true); ?></p>
			</div>
		</div>
		
		<?php unset($posts[0]); ?>
		<?php $counter = 0; ?>
		<?php foreach($posts as $post): ?>
			<?php $exclude[] = $post->ID; ?>
			<?php include('_objects/review.php'); ?>
			<?php $counter++; if($counter>=4){ break; } ?>
		<?php endforeach; ?>
	</div>
</div>


<?php $agent_favs = exsite_get_option('review_agent_favs'); ?>


<?php if($agent_favs): ?>
<div class='reviews-agents'>
	<div class='wrapper'>
		<h2>Agent Favorites</h2>
		<?php foreach($agent_favs as $review_id): ?>
		<?php $post = get_post( $review_id ); ?>
		<?php include('_objects/review.php'); ?>
		<?php $agent = get_post(get_post_meta($post->ID, '_review_agent', true)); ?> 
		<div class='review-quotes'>
			<p><?php echo get_post_meta($post->ID, '_review_quote', true); ?></p>
			<div class='review-agent'>
                <?php $featured = exsite_image_resize(get_post_thumbnail_id($agent->ID), '268x268'); ?>
				<a href='<?php echo get_permalink( $agent ); ?>'><img src="<?php echo $featured; ?>"></a>
				<a href='<?php echo get_permalink( $agent ); ?>'><?php echo $agent->post_title; ?></a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>




<?php $feat_partner = exsite_get_option('review_feat_partner'); ?>

<?php if($feat_partner): ?>
<?php $post = get_post($feat_partner); ?>
<div class='reviews-partners'>
	<?php $cover_id = get_post_meta($post->ID, '_partner_cover_id', true); ?>
    <?php $cover = exsite_image_resize($cover_id, '1800x0', false); ?>
	<div class='bg' style='background-image: url("<?php echo $cover; ?>");'></div>
	<div class='wrapper'>
		<h2>Featured Partner</h2>
		<div class='content'>
			<h3><?php echo $post->post_title; ?></h3>
			<p><?php echo $post->post_excerpt; ?></p>
			<a href='<?php echo get_permalink( $post ); ?>'>Learn More<svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a>
		</div>
		
		<?php if($reviews = get_post_meta($post->ID, '_partner_reviews', true)): ?>
		<?php $reviews = array_chunk($reviews, 2); ?>
	    <div class='partner-reviews'>
            <?php foreach($reviews[0] as $review_id): ?>
           		<?php $post = get_post($review_id); ?>
            	<?php include('_objects/review.php'); ?>
            <?php endforeach; ?>
	    </div>
	    <?php endif; ?>
		
		<a href='<?php echo get_permalink( $post ); ?>' class='mob-cta'>Learn More<svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a>
	</div>
</div>
<?php endif; ?>



<?php $discover = exsite_get_option('review_discover'); ?>
<?php if($discover): ?>
<?php $term = get_term( $discover ); ?>
<?php
	$args = array( 'posts_per_page' => 2, 'post_type' => 'review', 'exclude' => $exclude );
	$args['tax_query'] 	= array(
					array(
						'taxonomy' => $term->taxonomy,
						'field' => 'slug',
						'terms' => $term->slug
					)
				);
	$discover_posts = get_posts(  $args );
?>

<div class='reviews-discover'>
	<div class='wrapper'>
		<h2><span>Discover <?php echo $term->name; ?></span></h2>
		<?php foreach($discover_posts as $post): ?>
			<?php $exclude[] = $post->ID; ?>
			<?php include('_objects/review.php'); ?>
		<?php endforeach; ?>
		<a href='<?php echo home_url( '/reviews/?style='.$term->slug ); ?>'>View All<svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a>
	</div>
</div>
<?php endif; ?>


<?php $best_of = exsite_get_option('review_best_of'); ?>
<?php if($best_of): ?>
<div class='reviews-best'>
	<div class='wrapper'>
		<h2>Best Of</h2>
		<div class='best-controls'>
			<?php $first = true; ?>
			<?php foreach($best_of as $term_id): ?>
			<?php $term = get_term( $term_id ); ?>
			<span <?php if($first): ?>class='active'<?php endif; ?> data-id='<?php echo $term->slug; ?>'><svg class='<?php echo $term->slug; ?>'><use xlink:href="#<?php echo $term->slug; ?>"></use></svg> <?php echo $term->name; ?> <svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></span>
			<?php $first = false; ?>
			<?php endforeach; ?>
		</div>
		<div class='best-posts'>
			
			<?php $first = true; ?>
			<?php foreach($best_of as $term_id): ?>
			<?php $term = get_term( $term_id ); ?>
			<?php
				$args = array( 'posts_per_page' => 3, 'post_type' => 'review', 'exclude' => $exclude );
				$args['tax_query'] 	= array(
								array(
									'taxonomy' => $term->taxonomy,
									'field' => 'slug',
									'terms' => $term->slug
								)
							);
				$best_of_posts = get_posts(  $args );
			?>
			
			<div class='best-posts-inner <?php echo $term->slug; ?> <?php if($first): ?>active<?php endif; ?>'>
				<?php foreach($best_of_posts as $post): ?>
					<?php $exclude[] = $post->ID; ?>
					<?php include('_objects/review.php'); ?>
				<?php endforeach; ?>
			</div>
			<?php $first = false; ?>
			<?php endforeach; ?>
			
		</div>
		<?php $first = true; ?>
		<div class='cta-wrap'>
		<?php foreach($best_of as $term_id): ?>
		<?php $term = get_term( $term_id ); ?>
		<a href='<?php echo home_url( '/reviews/?style='.$term->slug ); ?>' class='best-cta <?php echo $term->slug; ?> <?php if($first): ?>active<?php endif; ?>'>All <span id='best-cta-name'><?php echo $term->name; ?></span><svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a>
		<?php $first = false; ?>
		<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>


<?php unset($posts[1]); unset($posts[2]); unset($posts[3]); unset($posts[4]); ?>

<?php endif; //filters?>
	
<div class='reviews-list'>	
	<div class='wrapper'>
		
		<?php if(count($styles) > 0): ?>
		<div class='reviews-tags'>
			<?php foreach($terms as $term): ?>
			<?php if(in_array($term->slug, $styles)): ?>
			<span class='tag' data-filter="<?php echo $term->slug; ?>"><svg class='close-icon'><use xlink:href="#close-icon"></use></svg> <?php echo $term->name; ?></span>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<div class='reviews-main'>
			
			<?php if(count($posts) > 0): ?>
				<?php foreach($posts as $post): ?>
					<?php $exclude[] = $post->ID; ?>
					<?php include('_objects/review.php'); ?>
				<?php endforeach; ?>
				<div class='review placeholder first-placeholder'></div>
				<div class='review placeholder'></div>
				<div class='review placeholder'></div>
				
				
				<?php 
				$args['paged'] = 2;
				$posts = get_posts(  $args ); 
				?>
				<?php if(count($posts)>0):?>
				<span class='load-more get-reviews' data-exclude="<?php echo implode(',', $exclude); ?>" data-paged="1" data-region="<?php echo $_GET['region']; ?>" data-styles="<?php echo $_GET['styles']; ?>" data-sort='<?php echo $_GET['sort']; ?>'>
					<span class="load-more-text">Load More</span> <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg>
				</span>
				<?php endif; ?>
			
			<?php else: ?>
				<p>No Reviews Found<span>Swap or Remove a Style for More Results</p>
			<?php endif; ?>
		</div>
		<!--<span class='load-more'>Load More <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg></span>-->
	</div>
</div>


<?php get_footer(); ?>