<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                        <?php if ( have_posts() ) : ?>

                            <header class="page-header content">
                                <h1 class="page-title title">
                                    <?php
                                    /* translators: %s: search query. */
                                    printf( esc_html__( 'Search Results for: %s', 'nailfist' ), '<span>' . get_search_query() . '</span>' );
                                    ?>
                                </h1>
                            </header><!-- .page-header -->

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content/list', 'search' );

                            endwhile;

                        ?>
                        <nav class="pagination is-centered is-small is-rounded" role="navigation" aria-label="pagination">
                            <?php echo nailfist_bulma_pagination(); ?>
                        </nav>
                        <?php

                        else :

                            get_template_part( 'template-parts/content/none' );

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
