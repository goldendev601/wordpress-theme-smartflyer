<div class='reviews-filters reviews reviews-filters-new'>
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
          <span class="button dd-apply" >Apply <svg class="arrow-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-right"></use></svg></span>
        </div>
      </span>



      <span class="dd-top step-1" >Partners <svg class="arrow-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use></svg>
        <div class="dd region partners">
	        
	        <?php $args = array(
		'post_type' => 'partner',
		'numberposts' => -1,
	);
	$partners = get_posts($args);
	?>
	        <?php foreach($partners as $partner): ?>
          <span data-filter="<?php echo get_permalink( $partner->ID ); ?>" class='partner'><?php echo $partner->post_title; ?></span>
          <?php endforeach; ?>
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