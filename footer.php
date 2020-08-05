<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nailfist
 */

?>

	<footer id="colophon" class="site-footer footer">
		<div class="site-info has-text-centered">
			<p class="is-size-7">
				<a class="has-text-weight-bold has-text-dark is-link" href="<?php echo esc_url( home_url('/') ); ?>">
						<?php bloginfo('name', 'nailfist'); ?>
				</a>
				&copy;
				<?php echo date('Y'); ?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
