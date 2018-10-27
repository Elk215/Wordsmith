<article class="col-block">
                    
    <div class="item-entry" data-aos="zoom-in">
        <div class="item-entry__thumb">
            <a href="<?php the_permalink(); ?>" class="item-entry__thumb-link">
                <?php the_post_thumbnail( $size = 'full', 'alt=trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt ));');?>
            </a>
        </div>

        <div class="item-entry__text">
            <div class="item-entry__cat">
                <?php the_category(); ?>
            </div>

            <h1 class="item-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                
            <div class="item-entry__date">
                <a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a>
            </div>
        </div>
    </div> <!-- item-entry -->

</article> <!-- end article -->