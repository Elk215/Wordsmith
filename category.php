<?php /* Template Name: Category */ ?>

<?php get_header(); ?>

<!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Category: <?php echo get_cat_name(get_query_var('cat')); ?></h1>
                <p class="lead"><?php echo category_description(); ?></p>
            </div>
        </div>
        
        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">
            
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/post', get_post_format() );?>

            <?php endwhile; ?>
            
            <?php else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            
            <?php endif; ?>
                

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

    </section> <!-- end s-content -->

<?php get_template_part( 'template-parts/extra'); ?>
<?php get_footer(); ?>      