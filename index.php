<?php get_header(); ?>

    <!-- featured 
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">
                <div class="featured-slider featured" data-aos="zoom-in">
                <?php
                $do_not_duplicate = array();
                $categories = get_categories(); 
                foreach ( $categories as $category ) {
                    $args = array(
                        'cat' => $category->term_id,
                        'post_type' => 'post',
                        'posts_per_page' => '1',
                    );  
                $query = new WP_Query( $args );
                
                if ( $query->have_posts() ) { ?>
                    <?php while ( $query->have_posts() ) {
            
                        $query->the_post();
                        $do_not_duplicate[] = $post->ID;
                        ?>
                        <div class="featured__slide">
                            <div class="entry">
                                <?php 
                                $image = get_field('post_image');
                                if( !empty($image) ): ?>	
                                <div class="entry__background" style="background-image:url('<?php echo $image['url']; ?>');"></div>
                                <?php endif; ?>
                                
                                
                                <div class="entry__content">
                                    <span class="entry__category"><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></span>

                                    <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>

                                    <div class="entry__info">
                                        <a href="<?php the_author_meta( 'user_url', 1 ); ?>" class="entry__profile-pic">
                                            <?php echo get_avatar(1); ?> 
                                        </a>
                                        <ul class="entry__meta">
                                            <li><a href="<?php the_author_meta( 'user_url', 1 ); ?>"><?php the_author_meta( 'nickname', 1 ); ?></a></li>
                                            <li><?php the_time('F j, Y'); ?></li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->
                                
                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->
            
                    <?php } ?>              
                <?php } 
                wp_reset_postdata();
                }
                ?>
   
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->

    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row entries-wrap wide">
            <?php if (  have_posts() ) : ?>
                <?php while (  have_posts() ) :  the_post();  ?>
                <?php endwhile; ?>
                <?php echo do_shortcode('[ajax_load_more container_type="div" css_classes="entries" transition_container="false" post_type="post" posts_per_page="4" scroll="false" button_label="Load more" button_loading_label="Loaded..."]');  ?>
            <?php else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
                <?php  wp_reset_postdata(); ?>
        </div> <!-- end entries-wrap -->

    </section> <!-- end s-content -->


<?php get_template_part( 'template-parts/extra'); ?>

<?php get_footer(); ?>  