<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nailfist
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('box is-paddingless is-marginless is-list'); ?>>
	<div class="columns is-gapless">
		<div class="column">
			<div class="entry-thumbnail">
				<?php nailfist_post_thumbnail(); ?>
			</div>
		</div>
		<div class="column is-three-quarters">
			<header class="entry-header">
				<?php
					the_title('<h2 class="title entry-title is-size-4 is-size-5-mobile">', '</h2>');
				?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta level is-size-7 is-mobile">
					<div class="level-left">
						<div class="level-item">
							<div>
								<p>
									<?php nailfist_posted_on(); ?>
								</p>
								<p>
									<?php nailfist_posted_by(); ?>
								</p>
							</div>
						</div>
					</div>
					<div class="level-right">
						<div class="level-item">
							<?php
								nailfist_entry_categories();
							?>
						</div>
					</div>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-summary is-relative is-clipped">
				<?php the_excerpt(); ?>
				<footer class="entry-footer is-overlay entry-readmore">
				</footer><!-- .entry-footer -->
				<?php nailfist_read_more(); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
