<?php
/*
 * Template Name: Itinerary
 * Template Post Type: post
 */
  
 get_header();  ?>
<?php smartflyer_post_view($post->ID); ?>
<?php $category = get_the_category($post->ID); $category = $category[0]; ?>

<div class='itinerary-hero'>
    <?php $featured_image = exsite_image_resize(get_post_thumbnail_id($post->ID), '1620x795'); ?>
    <img class='' src="<?php echo $featured_image; ?>">
    <div class='content'>
        <div>
	        <a href="<?php echo get_term_link($category); ?>">
		        <?php echo $category->name; ?>
		    </a>
	        <span><?php echo date('m.d.Y', strtotime($post->post_date)); ?></span>
        </div>
        <h1><?php echo $post->post_title; ?></h1>
    </div>
</div>

<div class='article-share'>
    <ul>
        <li style="color: #999999;" class="share-btn"><p>Share</p></li>
        <li style="color: #999999;"><a href='http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>'><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Facebook-icon.png"></a></li>
        <li style="color: #999999;"><a href="https://twitter.com/home?status=<?php echo urlencode($post->post_title); ?>%20%7C%20<?php echo urlencode(get_permalink($post->ID)); ?>%20%7C%20@theSmartFlyer"><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Linkedin-icon.png"></a></li>
        <li style="color: #999999;"><a href="mailto:?subject=<?php echo $post->post_title; ?>&body=Check out this post: <?php echo get_permalink($post->ID); ?>"><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Email-icon.png"></a></li>
        <li style="color: #999999;" class="pdf-download-btn-li"><img class='article-share-img pdf-download-btn' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/PDF-icon.png"></li>
    </ul>
</div>


<?php $stays = get_post_meta( $post->ID, '_post_stays', true ); ?>

<article class='itinerary-article'>

    <div class='itinerary-nav-wrap'>
        <div class='itinerary-nav sticky'>
            <span id='nav-itinerary-intro' data-anchor='itinerary-intro'>Intro</span>
            <?php if($stays): ?>
            <span id='nav-itinerary-stay' data-anchor='itinerary-stay'>Stay</span>
            <?php endif; ?>
            <span id='nav-itinerary-highlights' data-anchor='itinerary-highlights'>Highlights</span>
            <span id='nav-itinerary-main' data-anchor='itinerary-main'>itinerary</span>
        </div>
    </div>

    <!-- <div class='article-share'>
		<ul>
			<li style="color: #999999;">Share</li>
			<li style="color: #999999;"><a href='http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>'><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Facebook-icon.png"></a></li>
			<li style="color: #999999;"><a href="https://twitter.com/home?status=<?php echo urlencode($post->post_title); ?>%20%7C%20<?php echo urlencode(get_permalink($post->ID)); ?>%20%7C%20@theSmartFlyer"><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Linkedin-icon.png"></a></li>
			<li style="color: #999999;"><a href="mailto:?subject=<?php echo $post->post_title; ?>&body=Check out this post: <?php echo get_permalink($post->ID); ?>"><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Email-icon.png"></a></li>
			<li style="color: #999999;" class="pdf-download-btn-li"><img class='article-share-img pdf-download-btn' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/PDF-icon.png"></li>
		</ul>
	</div> -->

    <section id='itinerary-intro' class='itinerary-intro'>
        <div class='itinerary-wrapper'>
            <div class='intro-copy'><?php echo smartflyer_images_check(apply_filters('the_content', $post->post_content)); ?></div>
            <div class='details'>
                <div class='author-detail'>
                <div class='detail authors'>
                    <span>
                    <?php if (get_post_meta($post->ID, '_post_author_syntax', true)): ?>
                        Written By
                    <?php else: ?>
                        Contributed By
                    <?php endif; ?>
                    </span>
                    
                    
                    <?php 
						$author_content = '';
						$author_link = get_author_posts_url( $post->post_author );
						$author = get_user_meta($post->post_author, 'first_name', true).' '.get_user_meta($post->post_author, 'last_name', true);
						
						
						if($agents = get_post_meta($post->ID, '_post_agent', true))
						{
							
							if(is_array($agents))
							{
								foreach($agents as $agent_id)
								{
									$agent = get_post($agent_id);
									if ($agent->post_status == 'publish')
									{
										$author_link = get_permalink($agent->ID);	
										$author = $agent->post_title;
                                        $author_image = exsite_image_resize(get_post_thumbnail_id($agent->ID), '268x268');
										
										?>
										
										<a href='<?php echo $author_link; ?>'>
						                    <img class='' src="<?php echo $author_image; ?>">
						                    <p><?php echo $author; ?></p>
					                        <svg class='chev-right'>
					                            <use xlink:href="#chev-right"></use>
					                        </svg>
					                    </a>
										<?php
	
										
										$author_content.= '<a href="'.$author_link.'"><p>'.$author.'</p></a>, ';
									}
								}
								$author_content = rtrim($author_content,', ');
							}
							else
							{
								$agent = get_post($agents);
								if ($agent->post_status == 'publish')
								{
									$author_link = get_permalink($agent->ID);	
									$author = $agent->post_title;
									$author_content.= '<a href="'.$author_link.'"><p>'.$author.'</p></a>';
								}
							}
						}
						else
						{
							echo '<a href="'.$author_link.'"><p>'.$author.'</p></a>';	
						}
					?>

                    <?php if($authors = get_post_meta($post->ID, '_post_author', true)): ?>

                        <?php foreach($authors as $author): ?>

                            <?php $user = get_user_by('ID', $author); ?>

                            <?php if ($user->user_url != ''): ?>
                                <a href='<?php echo $user->user_url; ?>' target="_blank">
                            <?php else: ?>
                                <div class='author'>
                            <?php endif; ?>
                                    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>">
                                    <p><?php echo $user->display_name; ?></p>
                                    <?php if ($user->user_url != ''): ?>
                                        <svg class='chev-right'>
                                            <use xlink:href="#chev-right"></use>
                                        </svg>
                                    <?php endif; ?>
                            <?php if ($user->user_url != ''): ?>
                                </a>
                            <?php else: ?>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php endif; ?>
                </div>

                <?php if($other_credits = get_post_meta($post->ID, '_post_other_credits', true)): ?>
                <div class='credits'>
                <?php foreach($other_credits as $other_credit): ?>
                <div class='detail'>
                    <span><?php echo $other_credit['title']; ?></span>
                    <?php $link = $other_credit['link']; ?>
                    <?php if($link != ''): ?>
                    <a href='<?php echo $link; ?>' target="_blank">
                    <?php endif; ?>
                        <p><?php echo $other_credit['name']; ?></p>
                    <?php if($link != ''): ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
                </div>

                
                <?php $details = get_post_meta( $post->ID, '_post_details', true ); ?>
                <?php foreach($details as $detail): ?>
                <div class='detail'>
                    <span><?php echo $detail['title']; ?></span>
                    <p><?php echo $detail['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    
    <?php if($stays): ?>

    <section id='itinerary-stay' class='itinerary-stay'>
        <div class='itinerary-wrapper'>
            <h2 class='section-head'>Stay</h2>
            <?php if($stay_desc = get_post_meta( $post->ID, '_post_stay_desc', true )): ?>
            <p class='stay-copy'><?php echo $stay_desc; ?></p>
            <?php endif; ?>
            <div class='stay-slider'>
	            
	            <?php foreach($stays as $stay): ?>
	            
                <div class='stay-slide'>
	                
	                <?php if(count($stay['images']) > 1): ?>
                    <div class='inner-slider'>
	                    
	                    <?php $first = true; ?>
	                    <?php foreach($stay['images'] as $image_id => $url): ?>
                        <div class='image-wrap <?php if($first): ?>active<?php endif; ?>'>
                            <a href='<?php echo $stay['link']; ?>'>
                                <?php $image = exsite_image_resize($image_id, '488x272'); ?>
	                            <img src="<?php echo $image; ?>">
                            </a>
                            <?php $image_details = get_post($image_id); ?>
                            <?php if($image_details->post_excerpt != ''): ?>
                            <span><?php echo $image_details->post_excerpt; ?></span>
                            <?php endif; ?>
                        </div>
                        <?php $first = false; ?>
                        <?php endforeach; ?>
                        <div class='inner-slider-controls'>
                            <span class='inner-slider-prev disabled'><img src="<?php echo get_stylesheet_directory_uri() ?>/images/Vector-left.png"></span>
                            <span class='inner-slider-next'><img src="<?php echo get_stylesheet_directory_uri() ?>/images/Vector-right.png"></span>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class='image-wrap'>
	                    <?php $image_id = key($stay['images']); ?>
                        <a href='<?php echo $stay['link']; ?>'>
                            <?php $image = exsite_image_resize($image_id, '488x272'); ?>
                            <img src="<?php echo $image; ?>">
                        </a>
                        <?php $image_details = get_post($image_id); ?>
                        <?php if($image_details->post_excerpt != ''): ?>
                        <span><?php echo $image_details->post_excerpt; ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <h3>
                    	<a href='<?php echo $stay['link']; ?>'>
	                    	<?php echo $stay['title']; ?>
	                   	</a>
	                </h3>
                    <div class='content'>
                        <div class='text-wrap'>
                            <p><?php echo $stay['description']; ?></p>
                        </div>
                        <span class='content-cta'>More</span>
                    </div>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>
    </section>
    
    <?php endif; ?>
    
    
    <?php $items = get_post_meta( $post->ID, '_post_itinerary', true ); ?>
	
    <section id='itinerary-highlights' class='itinerary-highlights'>

        <div class='itinerary-wrapper'>
            <img class='highlight-sketch' src="<?php echo get_template_directory_uri(); ?>/img/6-Footer.jpg">
            <h2 class='section-head'>Highlights</h2>
            <ul class='highlights-list'>
	            
	            <?php $counter = 1; ?>
	            <?php foreach($items as $item): ?>
	            
	            <?php if($item['highlight_text'] != ''): ?>
                <li><?php echo $item['highlight_text']; ?> <a href='#itinerary-day-<?php echo $counter; ?>'>Day <?php echo $item['day']; ?></a>
                </li>
                <?php endif; ?>
                
                <?php $counter++; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section id='itinerary-main' class='itinerary-main'>
        <?php $featured_image = exsite_image_resize(get_post_meta( $post->ID, '_post_itinerary_img_id', true ), '1620x795'); ?>
        <img class='main-image' src="<?php echo $featured_image; ?>">
        <div class='itinerary-wrapper'>
            <h2 class='main-title'>Itinerary<span>Itinerary</span></h2>
        </div>
        
         <?php $counter = 1; ?>
	    <?php foreach($items as $item): ?>
        
        <div class='article-content'>
            <div class='itinerary-day' id='itinerary-day-<?php echo $counter; ?>'>
                <span class='day'><svg class='day'>
	                <use xlink:href="#day"></use></svg><?php echo $item['day']; ?></span>
                <?php if($item['location'] != ''): ?>
                <span class='location'>
                	<svg class='pin'><use xlink:href="#pin"></use></svg>
                	<?php echo $item['location']; ?>
                </span>
                <?php endif; ?>
                <div class='content'><?php echo $item['title']; ?></div>
            </div>
			<?php echo smartflyer_images_check(apply_filters('the_content', $item['description'])); ?>
        </div>        
        
         <?php $counter++; ?>
        <?php endforeach; ?>
        


		<?php if(get_post_meta($post->ID, '_post_show_book_now', true) == 'on'): ?>
        <div class='wrapper'>
            <div class='review-cta review-detail-cta'>
                <h2>Book Now </h2>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/goToIcon.png" style="width: 20px; margin-left: 10px; margin-top: 5px;">
                <p><?php echo get_post_meta($post->ID, '_post_book_text', true); ?></p>
            </div>
        </div>
        <?php endif; ?>
        
        <?php
			$args = array(
			    'posts_per_page'    =>  3,
			    'exclude'			=> array($post->ID),
			    'category' 		=> $category->term_id
			);
			$posts = get_posts(  $args );
			
			
			if(count($posts)<3)
			{
				$need_posts = 3 - count($posts);
				$exclude = array();
				$exclude[] = $post->ID;
				foreach($posts as $post)
					$exclude[] = $post->ID;	
				$filler_posts = get_posts(array('exclude'=>$exclude,'posts_per_page'=>$need_posts,'orderby' => 'rand'));	
				$posts = array_merge($posts, $filler_posts);
			}
			
		?>
		<?php if($posts): ?>
		<div class='article-ymal'>
			<div class='wrapper'>
				<h2 class='line'>You May Also Like</h2>
				<div class='just-wrap'>
					<?php foreach($posts as $post): ?>
					<?php include(get_template_directory().'/_objects/3-col-post.php'); ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
        

    </section>

</article>

<?php get_footer(); ?>