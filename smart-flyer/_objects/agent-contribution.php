<li>
    <a href="<?php echo get_permalink(); ?>">
        <div class="contribution-review-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
            <div class="contribution-review-wrapper-black">
                <div class="contribution-review-wrapper-inner">
                    <h1 class="contribution-review-name"><?php echo get_the_title(); ?></h1>
                    <h1 class="contribution-review-location"><?php echo get_post_meta(get_the_ID(), '_review_place', true); ?></h1>
                </div>
            </div>
        </div>
    </a>
</li>