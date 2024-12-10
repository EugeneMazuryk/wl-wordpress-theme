<?php
/**
 * Functions which add or edit the sidebars
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'wl_widgets_init_function' ) ) {
	function wl_widgets_init_function() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', THEME_DOMAIN ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', THEME_DOMAIN ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	//add_action( 'widgets_init', 'wl_widgets_init_function' );
}
