    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>
                <div class="block-1-2 block-m-full popular__posts">
                <?php $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>6)); ?>
                <?php if ( $wpb_all_query->have_posts() ) : ?>
                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <article class="col-block popular__post">
                    <a href="<?php the_permalink(); ?>" class="popular__thumb">
                        <?php the_post_thumbnail( $size = 'thumb', 'alt=trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt ));');?>
                    </a>
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="<?php the_author_meta( 'user_url', 1 ); ?>"><?php the_author_meta( 'nickname', 1 ); ?></a></span>
                        <span class="popular__date"><span>on</span> <time><?php the_time('F j, Y'); ?></time></span>
                    </section>
                </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?> 
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
                        <?php wp_nav_menu( array(
                        'theme_location'  => 'Меню категорий',
                        'menu'            => 'categoriesMenu', 
                        'container'       => 'ul', 
                        'menu_class'      => 'linklist', 
                        'echo'            => true
                        ) );?>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
                        <?php wp_nav_menu( array(
                        'theme_location'  => 'Нижнее меню',
                        'menu'            => 'bottomMenu', 
                        'container'       => 'ul', 
                        'menu_class'      => 'linklist', 
                        'echo'            => true
                        ) );?>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->

