<?php get_header(); ?>


<?php
$locations = get_terms(array('taxonomy' => 'agent_location'));
$specialties = get_terms(array('taxonomy' => 'agent_specialty'));

function cmp_count($a, $b)
{
	return $b->count - $a->count;
}
usort($specialties, "cmp_count");

?>

<?php $middle_states = false; ?>
<?php include('_inc/set-location-data.php'); ?>
<?php

$filter = false;
$exclude = array();
$sort = 'closest';
if ($middle_states)
	$sort = 'alpha';
$city_label = 'City';
$spec_label = 'Speciality';


//All agents
$args = array(
	'post_type'    		=>  'agent',
	'posts_per_page'    =>  -1,
	'meta_query' => array(
		array(
			'key'       => '_agent_management',
			'compare' => 'NOT EXISTS'
		)
	)
);
$all_posts = get_posts($args);


//Management
$management = false;
$args_mngt = array(
	'post_type'    		=>  'agent',
	'posts_per_page'    =>  -1,
	'meta_key'         	=> '_agent_management',
	'meta_value'			=> 'on'
);
$mngt_posts = get_posts($args_mngt);

//Filter on Management
if (isset($_GET['management'])) {
	$filter = true;
	$management = true;
	$posts = $mngt_posts;
}

//Filter on Search
$new_posts = array();
if (isset($_GET['search'])) {
	$filter = true;
	$search = true;
	foreach ($all_posts as $post)
		if (strpos(strtoupper($post->post_title), strtoupper($_GET['search'])) !== false)
			$new_posts[] = $post;

	$posts = $new_posts;
}

//Filter on Location
if (isset($_GET['location'])) {
	if ($_GET['location'] != 'all') {
		$filter = true;
		$args['tax_query'][] = array(
			'taxonomy' => 'agent_location',
			'field' => 'slug',
			'terms' => $_GET['location']
		);

		$city_label = str_replace('-', ' ', $_GET['location']);
		$posts = get_posts($args);
	}
}

//Filter on Specialty
if (isset($_GET['specialty'])) {
	if ($_GET['specialty'] != 'all') {
		$filter = true;
		$args['tax_query'][] = array(
			'taxonomy' => 'agent_specialty',
			'field' => 'slug',
			'terms' => $_GET['specialty']
		);
		$spec_label = str_replace('-', ' ', $_GET['specialty']);
		$posts = get_posts($args);
	}
}
//Specialty Default agents
$def_specialties = exsite_get_option('team_specialty_default');
$def_specialties_term = get_term($def_specialties);
$args_spec = array(
	'post_type'    		=>  'agent',
	'posts_per_page'    =>  6,
);
if ($def_specialties) {
	$args_spec['tax_query'][] = array(
		'taxonomy' => 'agent_specialty',
		'field' => 'id',
		'terms' => $def_specialties
	);
}
$spec_posts = get_posts($args_spec);


if (isset($_GET['sort'])) {
	$sort = $_GET['sort'];
	$filter = true;
}


if (isset($_GET['closest']))
	$sort = 'closest';


if (!$filter) {
	//Sort Filtering	
	if (count($args['tax_query']) > 0 && $sort != 'alpha')
		$sort = '';

	$closests_posts = array();
	if ($sort == 'closest') {
		foreach ($sorted_terms as $sorted_term) {
			unset($args['tax_query']);
			$args['tax_query'][] = array(
				'taxonomy' => $sorted_term->taxonomy,
				'field' => 'slug',
				'terms' => $sorted_term->slug
			);
			$args['orderby'] = 'title';
			$args['order'] = 'ASC';
			$other_posts = get_posts($args);
			foreach ($other_posts as $post)
				$closests_posts[$post->ID] = $post;
		}
	} elseif ($sort == 'alpha') {
		$args['orderby'] = 'title';
		$args['order'] = 'ASC';
		$other_posts = get_posts($args);
		foreach ($other_posts as $post)
			$posts[$post->ID] = $post;
	} else {
		$sort = 'closest';
		$args['orderby'] = 'title';
		$args['order'] = 'ASC';
		$other_posts = get_posts($args);
		foreach ($other_posts as $post)
			$posts[$post->ID] = $post;
	}
}

if (isset($_GET['closest'])) {
	$filter = true;
	$posts = $closests_posts;
}
?>

<script>
	var team_args = <?php echo json_encode($args); ?>;
</script>


<div class='team-filters'>
	<div class='team-dropdowns'>
		<span class="city-filtering">By Location <svg class='arrow-down'>
				<use xlink:href="#arrow-down"></use>
			</svg>
			<div class='dd-top'>
				<?php $parent_locations = get_terms(array('taxonomy' => 'agent_location', 'parent' => 0)); ?>
				<?php foreach ($parent_locations as $parent_term) : ?>
					<div><span><?php echo $parent_term->name; ?><svg class='arrow-down'>
								<use xlink:href="#arrow-down"></use>
							</svg></span>
						<?php $child_locations = get_terms(array('taxonomy' => 'agent_location', 'parent' => $parent_term->term_id)); ?>
						<div class='dd'>
							<?php foreach ($child_locations as $term) : ?>
								<span class='city' data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</span>
		<span class="spec-filtering">By Specialty <svg class='arrow-down'>
				<use xlink:href="#arrow-down"></use>
			</svg>
			<?php $specialties_count = 0; ?>
			<div class='dd-top'>
				<?php foreach ($specialties as $term) : ?>
					<span class='spec' data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?> <span><?php echo $term->count; ?></span></span>
					<?php $specialties_count++; ?>
					<?php if ($specialties_count >= 12) {
						break;
					} ?>
				<?php endforeach; ?>
			</div>
		</span>
	</div>
	<div class='input-wrap'>
		<img src="<?php echo get_stylesheet_directory_uri() ?>/images/search.svg"/>
		<input placeholder='Find an agent'>
		<button type='submit'>
			SEARCH
			<img src="<?php echo get_stylesheet_directory_uri() ?>/images/goToIcon.png" style="width: 20px; margin-left: 10px">
		</button>
		<span class='mob-filter-trigger'><svg class='close-icon'>
				<use xlink:href="#close-icon"></use>
			</svg></span>
	</div>

	<span class='mob-filter-trigger'><svg class='search-icon'>
			<use xlink:href="#search-icon"></use>
		</svg></span>

</div>



<?php if ($filter) : ?>



	<div class='wrapper'>


		<div class='reviews-tags'>

			<?php if ($_GET['search'] != '') : ?>
				<?php $are_we_filtering = true; ?>
				<span class='tag search-tag' data-filter="<?php echo $_GET['search']; ?>"><svg class='close-icon'>
						<use xlink:href="#close-icon"></use>
					</svg> <?php echo $_GET['search']; ?></span>
			<?php endif; ?>

			<?php if ($_GET['location'] != '') : ?>
				<?php $are_we_filtering = true; ?>
				<?php $term = get_term_by('slug', $_GET['location'], 'agent_location'); ?>
				<?php if ($term) : ?>
					<span class='tag location-tag' data-filter="<?php echo $term->slug; ?>"><svg class='close-icon'>
							<use xlink:href="#close-icon"></use>
						</svg> <?php echo $term->name; ?></span>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($_GET['specialty'] != '') : ?>
				<?php $are_we_filtering = true; ?>
				<?php $term = get_term_by('slug', $_GET['specialty'], 'agent_specialty'); ?>
				<?php if ($term) : ?>
					<span class='tag specialty-tag' data-filter="<?php echo $term->slug; ?>"><svg class='close-icon'>
							<use xlink:href="#close-icon"></use>
						</svg> <?php echo $term->name; ?></span>
				<?php endif; ?>
			<?php endif; ?>

		</div>


		<div class='team-grid'>

			<?php if (count($posts) > 0) : ?>

				<div class='reviews-main agents-main'>
					<?php foreach ($posts as $post) : ?>
						<?php include('_objects/agent.php'); ?>
					<?php endforeach; ?>
				</div>

			<?php else : ?>
				<p>No Agents Found</p>
			<?php endif; ?>

		</div>
	</div>


<?php else : ?>
	<div class='wrapper agent-hero'>
		<div class='team-hero'>
			<img src="<?php echo get_template_directory_uri(); ?>/img/team-map.png">
			<div class='content'>
				<h2><?php wp_reset_postdata(); //echo get_the_title(); ?></h2>
				<p><?php echo get_the_content(); ?></p>
				<span class='team-explore-cta'>Explore</span>
			</div>
		</div>
	</div>
	
	<div class='wrapper'>
		<div class='team-grid'>
			<h2><span>Agents By Specialty</span></h2>
			<div class='team-grid-controls'>
				<span class='w-icon'><small>Select Category</small><svg class='arrow-down'>
						<use xlink:href="#arrow-down"></use>
					</svg>
					<div class='dd-top'>
						<?php $specialties_count = 0; ?>
						<?php foreach ($specialties as $term) : ?>
							<span class='spec selection' data-where="specialty" data-tax="<?php echo $term->taxonomy; ?>" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?> <span><?php echo $term->count; ?></span></span>
							<?php $specialties_count++; ?>
							<?php if ($specialties_count >= 12) {
								break;
							} ?>
						<?php endforeach; ?>
					</div>
					<!-- <select class="mobile-selections">
						<?php $specialties_count = 0; ?>
						<?php foreach ($specialties as $term) : ?>
							<option data-where="specialty" data-tax="<?php echo $term->taxonomy; ?>" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
							<?php $specialties_count++; ?>
							<?php if ($specialties_count >= 12) {
								break;
							} ?>
						<?php endforeach; ?>
					</select> -->
				</span>
				<a class="all-link-specialty" href='<?php echo home_url('agents/?specialty=europe'); ?>'>View All <svg class='arrow-right'>
						<use xlink:href="#arrow-right"></use>
					</svg></a>
			</div>
			<a href='<?php echo home_url('agents/?specialty=' . $def_specialties_term->slug); ?>' class='mob-cta all-link-specialty'>View All <svg class='arrow-right'>
					<use xlink:href="#arrow-right"></use>
				</svg></a>
			<div class='reviews-main specialty agents-main'>
				<?php foreach ($spec_posts as $post) : ?>
					<?php include('_objects/agent.php'); ?>
				<?php endforeach; ?>
			</div>
			
		</div>
	</div>


	<div class='wrapper agent-hero'>
		<div class='team-grid'>
			<h2><span>Agents By Location</span></h2>
			<div class='team-grid-controls'>
				<span><small>Select location</small><svg class='arrow-down'>
						<use xlink:href="#arrow-down"></use>
					</svg>
					<div class='dd-top'>
						<?php $parent_locations = get_terms(array('taxonomy' => 'agent_location', 'parent' => 0)); ?>
						<?php foreach ($parent_locations as $parent_term) : ?>
							<div><span><?php echo $parent_term->name; ?><svg class='arrow-down'>
										<use xlink:href="#arrow-down"></use>
									</svg></span>
								<?php $child_locations = get_terms(array('taxonomy' => 'agent_location', 'parent' => $parent_term->term_id)); ?>
								<div class='dd'>
									<?php foreach ($child_locations as $term) : ?>
										<span class='city selection' data-where="location" data-tax="<?php echo $term->taxonomy; ?>" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<select class="mobile-selections">
						<option></option>
						<?php foreach ($parent_locations as $parent_term) : ?>
							<optgroup label="<?php echo $parent_term->name; ?>">
								<?php $child_locations = get_terms(array('taxonomy' => 'agent_location', 'parent' => $parent_term->term_id)); ?>
								<?php foreach ($child_locations as $term) : ?>
									<option data-where="location" data-tax="<?php echo $term->taxonomy; ?>" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
								<?php endforeach; ?>
							<?php endforeach; ?>
							</optgroup>
					</select>
				</span>
				<a class="all-link-location" href='<?php echo home_url('agents/?closest=yes'); ?>'>View All <svg class='arrow-right'>
						<use xlink:href="#arrow-right"></use>
					</svg></a>
			</div>
			<a href='<?php echo home_url('agents/?closest=yes'); ?>' class='mob-cta all-link-location'>View All <svg class='arrow-right'>
					<use xlink:href="#arrow-right"></use>
				</svg></a>
			<div class='reviews-main location agents-main'>
				<?php for ($i = 0; $i < 6; $i++) : ?>
					<?php
					if ($i == 0)
						$post = current($closests_posts);
					else
						$post = next($closests_posts);
					?>
					<?php if ($post) : ?>
						<?php include('_objects/agent.php'); ?>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
			
		</div>
	</div>

	<!-- <div class='team-featured-agents'>
		<div class="wrapper">
			<h2>Featured Agent<span>s</span></h2>
			<?php $agents = exsite_get_option('team_featured_agents'); 
			?>
			<div class='featured-agents'>
				<?php foreach ($agents as $agent_id) : ?>
					<?php $post = get_post($agent_id); ?>
					<div class='agent'>
						<div class='profile'>
							<?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '268x268'); ?>
							<a class='featured-image' href='<?php echo get_permalink($post->ID); ?>'>
								<img class='' src="<?php echo $featured; ?>">
							</a>
							<div class='socials'>
								<?php if ($fb =  get_post_meta($post->ID, '_agent_facebook', true)) : ?>
									<a href="<?php echo $fb; ?>" target="_blank"><svg class='fb'>
											<use xlink:href="#fb"></use>
										</svg></a>
								<?php endif; ?>
								<?php if ($tw =  get_post_meta($post->ID, '_agent_twitter', true)) : ?>
									<a href="<?php echo $tw; ?>" target="_blank"><svg class='tw'>
											<use xlink:href="#tw"></use>
										</svg></a>
								<?php endif; ?>
								<?php if ($insta =  get_post_meta($post->ID, '_agent_instagram', true)) : ?>
									<a href="<?php echo $insta; ?>" target="_blank"><svg class='ig'>
											<use xlink:href="#ig"></use>
										</svg></a>
								<?php endif; ?>
							</div>
							<a href='<?php echo get_permalink($post->ID); ?>' class='cta'>Full profile <svg class='chev-right'>
									<use xlink:href="#chev-right"></use>
								</svg></a>
						</div>
						<div class='content'>
							<?php $name = explode(' ', $post->post_title); ?>
							<h2><?php echo $name[0]; ?> <span><?php echo $name[1]; ?></span></h2>
							<div class='details'>
								<div class='detail'>
									<span>Location</span>
									<?php $terms = wp_get_post_terms($post->ID, 'agent_location');
									$term = $terms[0]; ?>
									<h3><?php echo $term->name; ?></h3>
								</div>
								<div class='detail'>
									<span>Experience</span>
									<h3><?php echo date('Y') - get_post_meta($post->ID, '_agent_experience', true); ?> Years</h3>
								</div>
							</div>
							<p><?php echo $post->post_excerpt; ?></p>
						</div>
						<a href='<?php echo get_permalink($post->ID); ?>' class='mob-cta'>Full Profile<svg class='chev-right'>
								<use xlink:href="#chev-right"></use>
							</svg></a>

					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div> -->

	<div class='wrapper'>
		<div class='team-join-cta'>
			<h2><a href='<?php echo  exsite_get_option('join_team_link'); ?>'><?php echo  exsite_get_option('join_team_title'); ?> <svg class='arrow-right-large'>
						<use xlink:href="#arrow-right-large"></use>
					</svg></a></h2>
			<p><?php echo  exsite_get_option('join_team_subhead'); ?></p>
		</div>
	</div>



<?php endif; ?>


<?php get_footer(); ?>