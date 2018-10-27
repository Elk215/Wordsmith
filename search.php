<?php get_header(); ?>

<!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">
        <?php
        $s=get_search_query();
        $args = array(
                        's' =>$s
                    );
            // The Query
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : ?>
        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Search Results for: <?php echo get_query_var('s');?></h1>
                <p class="lead"><?php echo category_description(); ?></p>
            </div>
        </div>
        
        <div class="row">
            <ul class="result">
            <?php while ( $the_query->have_posts() ): ?>
                <?php $the_query->the_post(); ?>
                <li class="result__item">
                    <h1 class="item-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                </li>
            <?php endwhile; ?>
            </ul>
        </div> <!-- end entries-wrap -->
        <?php else :  ?>

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Nothing Found for: <?php echo get_query_var('s');?></h1>
            </div>
        </div>

        <?php endif; ?>

    </section> <!-- end s-content -->

<?php get_template_part( 'template-parts/extra'); ?>
<?php get_footer(); ?>