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
        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-three-quarters">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content/single', get_post_type() );
                        ?>
                        <div class="section post-navigation">
                            <nav class="level is-mpbile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <?php previous_post_link(); ?>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <?php next_post_link(); ?>
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
        </div>

	</main><!-- #main -->

<?php
get_footer();
