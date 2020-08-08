<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nailfist
 */

get_header();
?>

	<main id="primary" class="site-main">
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-three-quarters">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content/single', get_post_type() );
                        ?>
                        <div class="section post-navigation">
                            <nav class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <?php previous_post_link('<span class="icon"><i class="fas fa-chevron-left"></i></span><span>%link</span>'); ?>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <?php next_post_link('<span>%link</span><span class="icon"><i class="fas fa-chevron-right"></i></span>'); ?>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <div class="column">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>
	</main><!-- #main -->

<?php
get_footer();
