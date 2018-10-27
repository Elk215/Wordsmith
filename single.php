<?php get_header(); ?>

  <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <?php 
                    $image = get_field('post_image');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />    				
                    <?php endif; ?>
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                <?php the_title(); ?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"><?php the_time('F j, Y'); ?></li>
                    <li class="byline">
                        By
                        <a href="<?php the_author_meta( 'user_url', 1 ); ?>"><?php the_author_meta( 'nickname', 1 ); ?></a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <?php echo $post->post_content ?>

                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list">
                        <?php the_category(' '); ?>
                        </span>
                    </div> <!-- end entry__cat -->
                    <?php 
                    $tags = get_the_tag_list();
                    if( !empty($tags) ): ?>
                    <div class="entry__tags">
                        <h5>Tags: </h5>
                        <span class="entry__tax-list entry__tax-list--pill">
                            <?php the_tags(' '); ?>
                        </span>
                    </div> <!-- end entry__tags -->
                    <?php endif; ?> 
                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    <?php echo get_avatar(1); ?> 
                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="<?php the_author_meta( 'user_url', 1 ); ?>"><?php the_author_meta( 'nickname', 1 ); ?></a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                            <?php the_author_meta( 'description', 1 ); ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->


        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <?php the_post_navigation( array(
                    'next_text' => '<span class="screen-reader-text">Next Post</span> ' . '%title',
                    'prev_text' => '<span class="screen-reader-text">Previous Post</span> ' . '%title',
                ) );?>

            </div>
        </div> <!-- end s-content__pagenav -->
        <div class="comments-wrap">
        <?php if ( comments_open() || get_comments_number() ) {
            comments_template();
        }?>
        </div>
        <!-- end comments-wrap -->

    </section> <!-- end s-content -->

<?php get_template_part( 'template-parts/extra'); ?>
<?php get_footer(); ?>      