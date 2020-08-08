<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nailfist
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('is-single'); ?>>
    <div class="entry-thumbnail">
        <?php nailfist_post_thumbnail(); ?>
    </div>
	<header class="entry-header">
		<?php
        the_title('<h1 class="entry-title title is-size-2 is-size-4-mobile">', '</h1>');

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta level is-mobile">
                <div class="level-left">
                    <div class="level-item">
                        <div>
                            <p>
                                <?php
                                nailfist_posted_on();
                                ?>
                            </p>
                            <p>
                                <?php nailfist_posted_by(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <?php nailfist_entry_categories(); ?>
                    </div>
                </div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nailfist' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nailfist' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
        <?php nailfist_entry_tags(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
