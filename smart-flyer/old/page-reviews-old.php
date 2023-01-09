<?php get_header(); ?>


<?php
$args = array(
    'post_type'    =>  'review',
    'paged'    =>  1,
    'posts_per_page'    => 40
);
$sort = "date";

$region_label = 'Region';
$style_label = 'Style';
$styles = array();



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
<div class='reviews-hero' <?php if($featured): ?>style="background-image: url('<?php echo $featured; ?>')"<?php endif; ?>>
  <h2><?php echo $post->post_title; ?></h2>
  <?php if($subtitle =  get_post_meta($post->ID, '_page_subtitle', true)): ?>
  <h3><?php echo $subtitle; ?></h3>
  <?php endif; ?>
</div>

<div class='reviews-filters reviews'>
  <div class='wrapper'>
      <div class='filters-left'>
      <span class="dd-top step-1"><?php echo $region_label; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd region">
          <?php $terms = get_terms( 'review_region' ); ?>
          <?php foreach($terms as $term): ?>
          <span data-filter="<?php echo $term->slug; ?>" class='region'><?php echo $term->name; ?></span>
          <?php endforeach; ?>
        </div>
      </span>
      
      <span class="dd-top step-2"><?php echo $style_label; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd style">
          <span>Select your favourites</span>
          <ul>
            <?php $terms = get_terms( 'review_style' ); ?>
            <?php foreach($terms as $term): ?>
            <li data-filter="<?php echo $term->slug; ?>" class="style_filter_<?php echo $term->slug; ?> <?php if(in_array($term->slug, $styles)): ?>selected<?php endif; ?>"><svg class='<?php echo $term->slug; ?>'><use xlink:href="#<?php echo $term->slug; ?>"></use></svg><?php echo $term->name; ?></li>
            <?php endforeach; ?>
          </ul>
          <span class="button dd-apply">Apply <svg class="arrow-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-right"></use></svg></span>
        </div>
      </span>
      </div>
      
    <div class='filters-right'>
      <span class='label'>Sort by:</span>
      
      <?php 
        $sorted = 'Date';
        $sortbytext = 'A-Z';
        $sortbyfilter = 'alpha';
        if($sort == 'alpha')
        {
          $sorted = 'A-Z';  
          $sortbytext = 'Date';
          $sortbyfilter = 'date';
        }
      ?>
      
      <span class="dd-top"><?php echo $sorted; ?> <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd sortby reviews">
          <span class="sortby" data-filter="<?php echo $sortbyfilter; ?>"><?php echo $sortbytext; ?></span>
        </div>
      </span>
    </div>
  </div>
</div>

  
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
        <span class='load-more get-reviews' data-paged="1" data-region="<?php echo $_GET['region']; ?>" data-styles="<?php echo $_GET['styles']; ?>" data-sort='<?php echo $_GET['sort']; ?>'>
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