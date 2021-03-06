<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nailfist
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-three-quarters is-centered">
                    <?php if ( have_posts() ) : ?>

                        <header class="page-header content">
                            <?php
                            the_archive_title( '<h1 class="page-title title">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                            ?>
                        </header><!-- .page-header -->

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content/list', get_post_type() );

                        endwhile;

                    ?>
                        <nav class="pagination is-centered is-small is-rounded" role="navigation" aria-label="pagination">
                            <?php echo nailfist_bulma_pagination(); ?>
                        </nav>
                    <?php
                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
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
