<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep"><?php the_field('contact_title'); ?></h1>
                <p class="lead">
                <?php the_field('contact_description'); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-full s-content__main">
                <p>
                <?php 
                $image = get_field('contact_image');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />    				
                <?php endif; ?>
                </p>

                <?php $idContact = get_page_by_title('About'); ?>
                    <?php echo $idContact->post_content; ?>
                </div>

                <div class="row">
                    <?php 
                    $block = get_field('contact_address');
                    if( !empty($block) ): ?>
                    <div class="col-six tab-full">
                        <h4>Where to Find Us</h4>

                        <?php the_field('contact_address'); ?>

                    </div>			
                    <?php endif; ?>

                    <?php 
                    $block = get_field('contact_info');
                    if( !empty($block) ): ?>
                    <div class="col-six tab-full">
                        <h4>Contact Info</h4>

                        <?php the_field('contact_info'); ?>

                    </div>			
                    <?php endif; ?>
                </div>

                <h4>Get In Touch</h4>

                <?php echo do_shortcode('[contact-form-7 id="6889" title="Contact"]'); ?>

            </div> <!-- s-content__main -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->



<?php get_template_part( 'template-parts/extra'); ?>




<?php get_footer(); ?>      