<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nailfist
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nailfist_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'nailfist_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nailfist_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nailfist_pingback_header' );

function nailfist_excerpt_length() {
    return 40;
}
add_action( 'excerpt_length', 'nailfist_excerpt_length' );

function nailfist_excerpt_more() {
    return '...';
}
add_action( 'excerpt_more', 'nailfist_excerpt_more' );

if (! function_exists('nailfist_bulma_pagination') ) {
    /*
    Class Name: bulma_pagination
    Description: Custom pagination using Bulma components (tested with Bulma 0.6.2 on Wordpress 4.9.4)
    Version: 0.2
    Author: Domenico Majorana
    */


    function nailfist_bulma_pagination() {
      global $wp_query;
      $big = 999999999; //I trust StackOverflow.
      $total_pages = $wp_query->max_num_pages; //you can set a custom int value to this var
      $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $total_pages,
        'prev_next' => false,
        'type'  => 'array',
        'prev_next'   => true,
        'prev_text'    => __( 'Previous', 'text-domain' ),
        'next_text'    => __( 'Next', 'text-domain'),
      ) );

      if ( is_array( $pages ) ) {
      //Get current page
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var( 'paged' );

      //Disable Previous button if the current page is the first one
        if ($paged == 1) {
          echo '<a class="pagination-previous" disabled>Previous</a>';
        } else {
          echo '<a class="pagination-previous" href="' . get_previous_posts_page_link() . '">Previous</a>';
        }

      //Disable Next button if the current page is the last one
        if ($paged<$total_pages) {
          echo '<a class="pagination-next" href="' . get_next_posts_page_link() . '">Next</a>
          <ul class="pagination-list">';
        } else {
          echo '<a class="pagination-next" disabled>Next</a>
          <ul class="pagination-list">';
        }

        for ($i=1; $i<=$total_pages; $i++) {
          if ($i == $paged) {
            echo '<li><a class="pagination-link is-current" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
          } else {
            echo '<li><a class="pagination-link" href="'. get_pagenum_link($i) . '">' . $i . '</a></li>';
          }
        }

        echo '</ul>';
      }
    }
}
