<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nailfist
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$nailfist_comment_count = get_comments_number();
			if ( '1' === $nailfist_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'nailfist' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $nailfist_comment_count, 'comments title', 'nailfist' ) ),
					number_format_i18n( $nailfist_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nailfist' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
        $comment_fields = array(
            'author' => '<div class="field comment-author"><input class="input" name="author" type="text" placeholder="Name" required></div>',
            'email' => '<div class="field comment-email"><input class="input" name="email" type="email" placeholder="Example@mail.com" required></div>',
            'url' => '<div class="field comment-url"><input class="input" name="url" type="url" placeholder="https://yourwebsite.com"></div>',
            'cookies' => '
                <div class="field">
                    <label for="wp-comment-cookies-consent">
                        <input type="checkbox" class="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes">
                        <small>Save my name, email, and website in this browser for the next time I comment.</small>
                    </label>
                </div>'        
        );
    $comment_form_args = array(
        'fields' => $comment_fields,
        'comment_field' => '<div class="field comment-field">
            <textarea class="textarea" name="comment" aria-required="true" required placeholder="Say Something..."></textarea>
        </div>'
    );
    comment_form( $comment_form_args);
	?>
</div><!-- #comments -->
