<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nailfist
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="error-404 not-found hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="content">
                        <h1 class="title">404</h1>
                        <h2 class="subtitle">
                            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nailfist' ); ?>
                        </h2>

                        <p>
                        <?php 
                            esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nailfist' ); ?>
                        </p>

                    </div>
                </div>
            </div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
