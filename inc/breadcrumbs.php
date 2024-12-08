<?php
/**
 * Breadcrumbs functions which enhance the theme by hooking into WordPress
 */

/**
 * Breadcrumbs theme function
 */
if ( ! function_exists( 'wl_breadcrumbs_function' ) ) {
	function wl_breadcrumbs_function() {
		global $post;
		global $author;
		global $wp_query;

		$separator = '<span>></span>';

		$output = '<div class="breadcrumbs">';

		if ( ! is_front_page() || ! is_home() ) {

			$output .= '<a href="' . esc_url( home_url() ) . '">' . __( 'Home' ) . '</a>';
			$output .= $separator;

			switch ( $post ) {
				case is_category():
				{
					$cat_obj     = $wp_query->get_queried_object();
					$this_cat_id = $cat_obj->term_id;
					$this_cat    = get_category( $this_cat_id );
					$parent_cat  = get_category( $this_cat->parent );
					if ( $this_cat->parent != 0 ) {
						$output .= ( get_category_parents( $parent_cat, true, $separator ) );
					}

					$output .= single_cat_title( '', false );
					break;
				}
				case is_search():
				{
					$output .= __( 'Search for:' ) . ' "' . get_search_query() . '"';
					break;
				}
				case is_day():
				{
					$output .= '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a>';
					$output .= $separator;
					$output .= '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a>';
					$output .= $separator;
					$output .= esc_html( get_the_time( 'd' ) );
					break;
				}
				case is_month():
				{
					$output .= '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a>';
					$output .= $separator;
					$output .= esc_html( get_the_time( 'F' ) );
					break;
				}
				case is_year():
				{
					$output .= esc_html( get_the_time( 'Y' ) );
					break;
				}
				case is_single() && ! is_attachment():
				{
					if ( get_post_type() != 'post' ) {
						$post_type = get_post_type_object( get_post_type() );

						// Check if post type has archive page
						if ( $post_type && $post_type->has_archive ) {
							$slug   = $post_type->rewrite;
							$output .= '<a href="' . esc_url( home_url() ) . '/' . $slug['slug'] . '">' . $post_type->labels->name . '</a>';
							$output .= $separator;
						}

						$output .= esc_html( get_the_title() );
					} else {
						$cat    = get_the_category();
						$cat    = $cat[0];
						$output .= get_category_parents( $cat, true, $separator );
						$output .= esc_html( get_the_title() );
					}
					break;
				}
				case ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404():
				{
					$post_type = get_post_type_object( get_post_type() );
					$output    .= esc_html( $post_type->labels->singular_name );
					break;
				}
				case  is_attachment():
				{
					$parent = get_post( $post->post_parent );
					$cat    = get_the_category( $parent->ID );
					$cat    = $cat[0];
					$output .= get_category_parents( $cat, true, $separator );
					$output .= '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
					$output .= $separator;
					$output .= esc_html( get_the_title() );
					break;
				}
				case  is_page() && ! $post->post_parent:
				{
					$output .= esc_html( get_the_title() );
					break;
				}
				case  is_page() && $post->post_parent:
				{
					$parent_id   = $post->post_parent;
					$breadcrumbs = array();
					while ( $parent_id ) {
						$page          = get_post( $parent_id );
						$breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
						$parent_id     = $page->post_parent;
					}
					$breadcrumbs = array_reverse( $breadcrumbs );
					foreach ( $breadcrumbs as $crumb ) {
						$output .= $crumb;
						$output .= $separator;
					}
					$output .= esc_html( get_the_title() );
					break;
				}
				case is_tag():
				{
					$output .= esc_html( single_tag_title( '', false ) );
					break;
				}
				case is_author():
				{
					$userdata = get_userdata( $author );
					$output   .= sprintf( __( 'by %s' ), esc_html( $userdata->display_name ) );
					break;
				}
				case is_404()():
				{
					$output .= __( 'Page not found' );
					break;
				}
				case get_query_var( 'paged' ):
				{
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						$output .= ' (';
					}
					$output .= sprintf( esc_html__( 'Page %s' ), get_query_var( 'paged' ) );
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						$output .= ')';
					}
					break;
				}
			}
		}

		$output .= '</div>';

		echo $output;
	}

	add_action( 'theme_breadcrumbs', 'wl_breadcrumbs_function', 10, 1 );
}
