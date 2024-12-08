<?php
/**
 * Register custom taxonomies
 */
if ( ! function_exists( 'wl_create_taxonomies_function' ) ) {
	function wl_create_taxonomies_function() {

		/**
		 * TAXONOMY ----------------------------------------------------------------------------------------------------
		 */
		$labels = array(
			'name'          => __( 'TAXONOMY', THEME_DOMAIN ),
			'singular_name' => __( 'TAXONOMY', THEME_DOMAIN ),
			'menu_name'     => __( 'TAXONOMY', THEME_DOMAIN ),
		);

		$rewrite = array(
			'slug'         => 'TAXONOMY_SLUG',
			'hierarchical' => true,
			'with_front'   => false,
		);

		$args = array(
			'labels'             => $labels,
			'hierarchical'       => true,
			'public'             => false,
			'show_ui'            => true,
			'query_var'          => true,
			'show_admin_column'  => true,
			'show_in_nav_menus'  => false,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_in_rest'       => true,
			'publicly_queryable' => false,
			'rewrite'            => $rewrite,
		);

		register_taxonomy( 'TAXONOMY', array( 'POST_TYPE' ), $args );
	}

	//add_action( 'init', 'wl_create_taxonomies_function' );
}

/**
 * Change default taxonomies
 */
if ( ! function_exists( 'wl_change_default_taxonomies_param_function' ) ) {
	function wl_change_default_taxonomies_param_function( $args, $taxonomy ) {
		/** TAG taxonomy **/
		if ( 'post_tag' === $taxonomy ) {
			$args['rewrite'] = array(
				'slug'         => 'tag',
				'hierarchical' => true,
				'with_front'   => false,
			);
		}

		return $args;
	}

	//add_filter('register_taxonomy_args', 'wl_change_default_taxonomies_param_function', 10, 2);
}

flush_rewrite_rules();
