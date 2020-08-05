<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nailfist
 */

if ( ! function_exists( 'nailfist_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function nailfist_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);
		}

		$output = sprintf(
			'<span class="entry-date">
				<span class="icon is-small">
					<img src="%1$s" class="injectable">
				</span>
				<span>
					%2$s
				</span>
			</span>',
			get_template_directory_uri() . '/assets/icons/calendar.svg',
			$time_string
		);

		echo $output;
	}
endif;

if ( ! function_exists( 'nailfist_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function nailfist_posted_by() {
		$byline = sprintf(
			'<span class="entry-author">
				<span class="icon is-small">
					<img src="%1$s" class="injectable">
				</span>
				<span class="author vcard">%2$s</span>
			</span>',
			get_template_directory_uri() . '/assets/icons/user.svg',
			esc_html( get_the_author() )
		);
		echo $byline;
	}
endif;

if ( ! function_exists( 'nailfist_entry_categories' ) ):
	function nailfist_entry_categories() {
		if ('post' == get_post_type()) {

            if (is_single()) {
                $categories = get_the_category_list();
                printf('<div class="cat-links">%1$s</div>', $categories);
            }
            else {
                $categories = get_the_category();
                $first_category = $categories[0];
                printf('<a href="%1$s" role="button" class="tag is-primary">
                    <span class="entry-category">%2$s</span>
                </a>', 
                esc_url(get_category_link( $first_category->term_id) ), 
                $first_category->name);
            }
		}
	}
endif;

if ( ! function_exists( 'nailfist_entry_tags' ) ):
	function nailfist_entry_tags() {
		if ('post' == get_post_type() && is_single()) {
            $tags_list = '';
            $tags = get_tags();
            foreach ($tags as $tag) {
                $tags_list .= sprintf('<a class="tag is-light" href="%1$s" rel="tag">#%2$s</a>', get_tag_link( $tag->term_id ), $tag->name);
            }
            printf('<div class="tags">%1$s</div>', $tags_list);
		}
	}
endif;

//if ( ! function_exists( 'nailfist_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	//function nailfist_entry_footer() {
		//if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			//echo '<span class="comments-link">';
			//comments_popup_link(
				//sprintf(
					//wp_kses(
						//[> translators: %s: post title <]
						//__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nailfist' ),
						//array(
							//'span' => array(
								//'class' => array(),
							//),
						//)
					//),
					//wp_kses_post( get_the_title() )
				//)
			//);
			//echo '</span>';
		//}

		//edit_post_link(
			//sprintf(
				//wp_kses(
					//[> translators: %s: Name of current post. Only visible to screen readers <]
					//__( 'Edit <span class="screen-reader-text">%s</span>', 'nailfist' ),
					//array(
						//'span' => array(
							//'class' => array(),
						//),
					//)
				//),
				//wp_kses_post( get_the_title() )
			//),
			//'<span class="edit-link">',
			//'</span>'
		//);
	//}
//endif;
//

if ( ! function_exists( 'nailfist_read_more' ) ):
	function nailfist_read_more() {
		printf(
            '<a href="%1$s" role="button" class="button is-light is-readmore-button">
                <span class="icon">
                    %2$s
                    <img src="%3$s" class="injectable">
                </span>
            </a>',
			esc_url( get_the_permalink() ),
            __('Continue Reading'),
            get_template_directory_uri() . '/assets/icons/arrow-right.svg'
		);
	}
endif;

if ( ! function_exists( 'nailfist_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function nailfist_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			?>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
