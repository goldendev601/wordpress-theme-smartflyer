<?php get_header(); ?>


<?php $featured_id = get_post_thumbnail_id($post->ID); ?>
<?php $featured = wp_get_attachment_image_src($featured_id, '1512_377'); ?>
<div class='reviews-hero team' <?php if($featured): ?>style="background-image: url('<?php echo $featured[0]; ?>')"<?php endif; ?>>
  <h2><?php echo $post->post_title; ?></h2>
  <?php if($subtitle =  get_post_meta($post->ID, '_page_subtitle', true)): ?>
  <h3><?php echo $subtitle; ?></h3>
  <?php endif; ?>
</div>


<?php $locations = get_terms( 'agent_location' ); ?>
<?php include('_inc/set-location-data.php'); ?>
<?php 
  
  $specialties_db = get_terms( 'agent_specialty' ); 
  $specialties = array();
  
  foreach($specialties_db as $spec_db)
  {
    $args = array(
        'post_type'       =>  'agent',
        'posts_per_page'    =>  -1,
      'tax_query'     => array(array(
                    'taxonomy' => 'agent_specialty',
                    'field' => 'slug',
                    'terms' => $spec_db->slug
                  ))
      );
    $check_posts = get_posts(  $args );
    if(count($check_posts)>2)
      $specialties[] = $spec_db;
  }
  
?>


<?php


$filter = false;
$mng_posts = array();
$exclude = array();
$sort = 'closest';
$city_label = 'City';
$spec_label = 'Speciality';



//Management First
$args = array(
    'post_type'       =>  'agent',
    'posts_per_page'    =>  -1,
    'meta_key'          => '_agent_management',
    'meta_value'      => 'on'
);


//Filter on Location
if(isset($_GET['location']))
{
  if($_GET['location'] != 'all')
  {
    $filter = true;
    $args['tax_query'][] = array(
                    'taxonomy' => 'agent_location',
                    'field' => 'slug',
                    'terms' => $_GET['location']
                  );
    
    $city_label = str_replace('-', ' ', $_GET['location']);
  }
}

//Filter on Specialty
if(isset($_GET['specialty']))
{
  if($_GET['specialty'] != 'all')
  {
    $filter = true;
    $args['tax_query'][] = array(
                    'taxonomy' => 'agent_specialty',
                    'field' => 'slug',
                    'terms' => $_GET['specialty']
                  );
    $spec_label = str_replace('-', ' ', $_GET['specialty']);
  }
}


if(isset($_GET['sort']))
{
  $sort = $_GET['sort'];
  $filter = true;
}


if($filter)
{
  unset($args['meta_key']);
  unset($args['meta_value']);
}
else
{
  $mng_posts = array();
  /*
  $mng_posts = get_posts(  $args );
  foreach($mng_posts as $post)
    $exclude[] = $post->ID;
  */
}


//Get Agents

//Filter only for management
$management = false;
if(isset($_GET['management']))
{
  if($_GET['management'] == 'no')
  {
    unset($args['meta_key']);
    unset($args['meta_value']); 
  }
  else
  {
    $args['meta_key'] = '_agent_management';
    $args['meta_value'] = 'on';
    $management = true;
    $sort = '';
  }
}
else
{
  unset($args['meta_key']);
  unset($args['meta_value']);
}
$args['exclude'] = $exclude;


//Sort Filtering
  
$posts = $mng_posts;
if(count($args['tax_query']) > 0 && $sort != 'alpha')
  $sort = '';


if($sort == 'closest')
{
  foreach($sorted_terms as $sorted_term)
  {
    unset($args['tax_query']);
    $args['tax_query'][] = array(
                    'taxonomy' => $sorted_term->taxonomy,
                    'field' => 'slug',
                    'terms' => $sorted_term->slug
                  );
    $args['orderby'] = 'title'; 
    $args['order'] = 'ASC';
    $other_posts = get_posts(  $args );
    foreach($other_posts as $post)
      $posts[$post->ID] = $post;
  }
}
elseif($sort == 'alpha')
{
  $args['orderby'] = 'title'; 
  $args['order'] = 'ASC';
  $other_posts = get_posts(  $args );
  foreach($other_posts as $post)
    $posts[$post->ID] = $post;
}
else
{
  $sort = 'closest';
  $args['orderby'] = 'title'; 
  $args['order'] = 'ASC';
  $other_posts = get_posts(  $args );
  foreach($other_posts as $post)
    $posts[$post->ID] = $post;  
}


?>    


<div class='reviews-filters team'>
  <div class='wrapper'>
      <div class='filters-left'>
      <span class="dd-top"><?php echo $city_label; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd list city">
          <span class='city' data-filter="all">All</span>
          <?php foreach($locations as $term): ?>
          <span class='city' data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
          <?php endforeach; ?>
        </div>
      </span>
      <span class="dd-top"><?php echo $spec_label; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd list spec">
          <span class='spec' data-filter="all">All</span>
          <?php foreach($specialties as $term): ?>
          <span class='spec' data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
          <?php endforeach; ?>
        </div>
      </span>
      <span class='check-wrap management-click'>
        <span class='box <?php if($management):?>active<?php endif; ?>'><svg class='check'><use xlink:href="#check"></use></svg></span>
        <svg class='star'><use xlink:href="#star"></use></svg>
        Leadership
      </span>
    </div>
    
    <div class='filters-right'>
      <span class='label'>Sort by:</span>
      <?php 
        $sorted = 'Closest to Me';
        $sortbytext = 'Alphabetical';
        $sortbyfilter = 'alpha';
        if($sort == 'alpha')
        {
          $sorted = 'Alphabetical'; 
          $sortbytext = 'closest';
          $sortbyfilter = 'closest';
        }
      ?>
      <span class="dd-top"><?php echo $sorted; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd list sortby team">
          <span class="sortby" data-filter="<?php echo $sortbyfilter; ?>"><?php echo $sortbytext; ?></span>
        </div>
      </span>
    </div>
    
    <div class='filters-mobile'>
      <span class="dd-top">Filter <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd list col-2">
          <ul class="city">
            <li class='title'>City</li>
            <li><span class='city' data-filter="all">All</span></li>
            <?php foreach($locations as $term): ?>
            <li><span class='city' data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span></li>
            <?php endforeach; ?>
          </ul><!--
          --><ul class="spec">
            <li class='title'>Speciality</li>
            <li><span class='spec' data-filter="all">All</span></li>
            <?php foreach($specialties as $term): ?>
            <li><span class='spec' data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </span>
      <span class="dd-top"><?php echo $sorted; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd list sortby">
          <span class="sortby" data-filter="<?php echo $sortbyfilter; ?>"><?php echo $sortbytext; ?></span>
        </div>
      </span>
    </div>
  </div>
</div>



<div class='reviews-list'>
  <div class='wrapper'>
      <div class='reviews-main'>
      
      <?php if(count($posts) > 0): ?>
        <?php foreach($posts as $post): ?>
        <?php $management = get_post_meta($post->ID, '_agent_management', true); ?>
        <div class='agent <?php if($management == 'on'): ?>management<?php endif; ?> whole-click'>
          <?php if($management == 'on'): ?><svg class='star'><use xlink:href="#star"></use></svg><?php endif; ?>
          <?php $featured = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '268_268'); ?>
          <?php
          $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '268x268');
            if($featured)
              $image = $featured;
            else
              $image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
          ?>
          <a href='<?php echo get_permalink($post->ID); ?>'><img class='' src="<?php echo $image; ?>"></a>
          <h2><?php echo $post->post_title; ?></h2>
          <?php $terms = wp_get_post_terms( $post->ID, 'agent_location' ); $term = $terms[0]; ?>
          <span><?php echo $term->name; ?></span>
        </div>
        <?php endforeach; ?>
        
        
        <div class='agent placeholder'></div>
        <div class='agent placeholder'></div>
        <div class='agent placeholder'></div>
        <div class='agent placeholder'></div>
        <div class='agent placeholder'></div>
        
      <?php else: ?>
        <p>No Agents Found<span>Try a Different City or Speciality</span></p>
      <?php endif; ?>
       
         

      </div>
    <!--<span class='load-more'>Load More <svg class='arrow-down'><use xlink:href="#arrow-down"></use></svg></span>-->
    </div>
</div>


<?php include('_objects/social-footer-agents.php'); ?>

<?php get_footer(); ?>