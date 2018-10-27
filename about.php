<?php /* Template Name: About */ ?>

<?php get_header(); ?>





    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep"><?php the_field('about_title'); ?> </h1>
                <p class="lead">
                <?php the_field('about_description'); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-full s-content__main">
                <p>
                <?php 
                $image = get_field('about_image');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />    				
                <?php endif; ?>

                <?php $idContact = get_page_by_title('About'); ?>
                    <?php echo $idContact->post_content; ?>
                </div>

                <hr>

                <div class="row block-1-2 block-tab-full">

                    <?php 
                    $block = get_field('about_block1');
                    if( !empty($block) ): ?>
                    <div class="col-block">
                        <h4 class="quarter-top-margin">Who We Are.</h4>
                        <p><?php the_field('about_block1'); ?></p>
                    </div>			
                    <?php endif; ?>

                    <?php 
                    $block = get_field('about_block2');
                    if( !empty($block) ): ?>
                    <div class="col-block">
                        <h4 class="quarter-top-margin">Our Mission.</h4>
                        <p><?php the_field('about_block2'); ?></p>
                    </div>			
                    <?php endif; ?>

                    <?php 
                    $block = get_field('about_block3');
                    if( !empty($block) ): ?>
                    <div class="col-block">
                        <h4 class="quarter-top-margin">Our Vision.</h4>
                        <p><?php the_field('about_block3'); ?></p>
                    </div>			
                    <?php endif; ?>

                    <?php 
                    $block = get_field('about_block4');
                    if( !empty($block) ): ?>
                    <div class="col-block">
                        <h4 class="quarter-top-margin">Our Core Values.</h4>
                        <p><?php the_field('about_block4'); ?></p>
                    </div>			
                    <?php endif; ?>

                </div>

            </div> <!-- s-content__main -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->


<?php get_template_part( 'template-parts/extra'); ?>




<?php get_footer(); ?>      