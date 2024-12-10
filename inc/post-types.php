<?php
/**
 * Register custom post types
 */
if ( ! function_exists( 'wl_create_post_type_function' ) ) {
	function wl_create_post_type_function() {

		/**
		 * POST_TYPE ---------------------------------------------------------------------------------------------------
		 */
		$labels = array(
			'name'               => __( 'POST_TYPE', THEME_DOMAIN ),
			'singular_name'      => __( 'POST_TYPE', THEME_DOMAIN ),
			'add_new_item'       => __( 'Add' ),
			'edit_item'          => __( 'Edit' ),
			'new_item'           => __( 'New Post' ),
			'view_item'          => __( 'Preview' ),
			'search_items'       => __( 'Search' ),
			'not_found'          => __( 'No posts found.' ),
			'not_found_in_trash' => __( 'No posts found in Trash.' ),
			'menu_name'          => __( 'POST_TYPES', THEME_DOMAIN ),
			'all_items'          => __( 'All Posts' ),
			'add_new'            => __( 'Add' ),
			'featured_image'     => _x( 'Featured image', 'post' ),
		);

		$rewrite = array(
			'slug'         => 'POST_TYPE_SLUG',
			'hierarchical' => true,
			'with_front'   => false,
		);

		$args = array(
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			// title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes
			'taxonomies'          => array(),
			'hierarchical'        => false,
			'has_archive'         => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-admin-appearance',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
			//'rewrite'             => $rewrite,
		);

		register_post_type( 'POST_TYPE', $args );
	}

	//add_action( 'init', 'wl_create_post_type_function' );
}

/**
 * Change default post types
 */
if ( ! function_exists( 'wl_change_default_post_type_post_param_function' ) ) {
	function wl_change_default_post_type_post_param_function( $args, $post_type ) {
		/** POST post_type **/
		if ( 'post' === $post_type ) {
			$args['menu_icon'] = 'dashicons-welcome-write-blog';
			$args['menu_position'] = 30;
		}

		/** PAGE post_type **/
		if ( 'page' === $post_type ) {
			// Remove editor in page with template
			if ( ! function_exists( 'wl_remove_editor_from_pages_function' ) ) {
				function wl_remove_editor_from_pages_function() {
					global $post;
					if ( isset( $post->ID ) ) {
						$current_page_template_slug = basename( get_page_template_slug( $post->ID ) );
						if ( ! empty( $current_page_template_slug ) ) {
							remove_post_type_support( 'page', 'editor' );
						}
					}
				}

				add_action( 'admin_enqueue_scripts', 'wl_remove_editor_from_pages_function' );
			}

			// Remove thumbnail in page with template
			if ( ! function_exists( 'wl_remove_page_thumbnail_support_function' ) ) {
				function wl_remove_page_thumbnail_support_function() {
					remove_post_type_support( 'page', 'thumbnail' );
					remove_post_type_support( 'page', 'excerpt' );
				}

				add_action( 'init', 'wl_remove_page_thumbnail_support_function' );
			}
		}

		/** Remove taxonomies from post type "POST" **/
		if ( ! function_exists( 'wl_unregister_taxonomies_function' ) ) {
			function wl_unregister_taxonomies_function() {
				// Editor
				//remove_post_type_support( 'post', 'editor' );
				// Tags
				//unregister_taxonomy_for_object_type( 'post_tag', 'post' );
				// Category
				//unregister_taxonomy_for_object_type( 'category', 'post' );
				// Comments
				//remove_post_type_support( 'post', 'comments' );
				// Authors
				//remove_post_type_support( 'post', 'author' );
			}

			add_action( 'init', 'wl_unregister_taxonomies_function', 99 );
		}

		return $args;
	}

	add_filter( 'register_post_type_args', 'wl_change_default_post_type_post_param_function', 0, 2 );
}

flush_rewrite_rules();
