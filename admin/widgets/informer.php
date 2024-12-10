<?php
/**
 * Theme informer widget dashboard
 */

/**
 * Add 'Informer' widget to the dashboard.
 */
if ( ! function_exists( 'wl_add_to_dashboard_informer_widget_function' ) ) {
	function wl_add_to_dashboard_informer_widget_function() {
		wp_add_dashboard_widget(
			'wl_informer_dashboard_widget',
			esc_html__( 'Theme Widget', WL_THEME_ADMIN_DOMAIN ),
			'wl_informer_widget_output_html_callback_function'
		);
	}

	add_action( 'wp_dashboard_setup', 'wl_add_to_dashboard_informer_widget_function', 10 );
}

/**
 * Render html theme informer
 */
if ( ! function_exists( 'wl_informer_widget_output_html_callback_function' ) ) {
	function wl_informer_widget_output_html_callback_function() {
		global $wp_theme;

		ob_start();
		?>

        <div class="main">
            <p>
                <b>
					<?php printf( __( '%s version: %s', WL_THEME_ADMIN_DOMAIN ),
						esc_html__( $wp_theme->get( 'Name' ) ),
						esc_html__( $wp_theme->get( 'Version' ) ),
					); ?>
                </b>
            </p>
            <ul>
                <li>
                    <span class="dashicons dashicons-admin-settings"></span>
                    <a href="<?php menu_page_url( 'wl_theme_options' ); ?>">
						<?php esc_html_e( 'Settings' ); ?>
                    </a>
                </li>
                <li>
                    <span class="dashicons dashicons-editor-help"></span>
                    <a href="<?php echo esc_url( WL_THEME_ADMIN_URL . 'documentation' ); ?>">
						<?php esc_html_e( 'Documentation' ); ?>
                    </a>
                </li>
            </ul>
            <p class="widget-copyright">
				<?php printf( __( 'Created %s with %s', WL_THEME_ADMIN_DOMAIN ),
					'<a href="' . esc_url( $wp_theme->get( 'AuthorURI' ) ) . '" target="_blank"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTIuNSAxNCIgc3R5bGU9ImhlaWdodDoxMnB4IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxzdHlsZT4uc3Qwe2ZpbGw6IzUyNTE1Mn08L3N0eWxlPjxjaXJjbGUgY3g9IjQuNyIgY3k9IjQuMSIgcj0iNC4xIiBjbGFzcz0ic3QwIi8+PHBhdGggZD0iTTEyLjUgMTAuN2MwIDEuOC0xLjUgMy4zLTMuMyAzLjNTNiAxMi41IDYgMTAuN2MwLS42LjItMS4xLjMtMS4zLjUtMS4xIDEuNy0yIDMtMiAxLjYuMSAzLjIgMS41IDMuMiAzLjN6IiBjbGFzcz0ic3QwIi8+PHBhdGggZD0iTTUuMSA4LjJjLjQtLjEuOSAwIDEuMS40LjIuMy4yLjcgMCAxIDEuMS0uNyAyLjMtMS40IDMuNC0yLjEtLjQgMC0uOC0uMS0xLS41LS4zLS4zLS4zLS44LS4xLTEuMi0xLjEuOC0yLjMgMS42LTMuNCAyLjR6IiBjbGFzcz0ic3QwIi8+PGxpbmVhckdyYWRpZW50IGlkPSJTVkdJRF8xXyIgeDE9IjMuMzcxIiB4Mj0iMS4xMTQiIHkxPSI1OTcuMDI5IiB5Mj0iNjAwLjkzOCIgZ3JhZGllbnRUcmFuc2Zvcm09InRyYW5zbGF0ZSgwIC01ODcuNDk4KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZkZWIzNCIvPjxzdG9wIG9mZnNldD0iLjA1OSIgc3RvcC1jb2xvcj0iI2ZmZTAwYSIvPjxzdG9wIG9mZnNldD0iLjEzIiBzdG9wLWNvbG9yPSIjZmZkNDA2Ii8+PHN0b3Agb2Zmc2V0PSIuMjAzIiBzdG9wLWNvbG9yPSIjZmVjYjA1Ii8+PHN0b3Agb2Zmc2V0PSIuMjgxIiBzdG9wLWNvbG9yPSIjZmRjODA0Ii8+PHN0b3Agb2Zmc2V0PSIuNjY4IiBzdG9wLWNvbG9yPSIjZjE4ZjMzIi8+PHN0b3Agb2Zmc2V0PSIuODg4IiBzdG9wLWNvbG9yPSIjZTk2MDMyIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZTQzMzJlIi8+PC9saW5lYXJHcmFkaWVudD48Y2lyY2xlIGN4PSIyLjIiIGN5PSIxMS41IiByPSIyLjIiIGZpbGw9InVybCgjU1ZHSURfMV8pIi8+PC9zdmc+" alt="Weblorem logo">' . esc_html( $wp_theme->get( 'Author' ) ) . '</a>',
					'<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDMyIDMyIiB3aWR0aD0iMzJweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGcgaWQ9ImZsYWdfeDJDX19Va3JhaW5lX3gyQ19faGVhcnRfeDJDX19sb3ZlIj48ZyBpZD0iWE1MSURfNzg0XyI+PGcgaWQ9IlhNTElEXzEyMDFfIj48ZyBpZD0iWE1MSURfMTI0Nl8iPjxwYXRoIGQ9Ik0yMi41NjUsNC41MDhjLTIuNzMsMC01LjEzOSwxLjM4LTYuNTY1LDMuNDhjLTEuNDI3LTIuMTAxLTMuODM1LTMuNDgtNi41NjYtMy40OCAgICAgIEM1LjA1Miw0LjUwOCwxLjUsOC4wNiwxLjUsMTIuNDQyYzAsOS4zMDIsMTQuNSwxNy4wNSwxNC41LDE3LjA1czE0LjUtNy43NDgsMTQuNS0xNy4wNUMzMC41LDguMDYsMjYuOTQ4LDQuNTA4LDIyLjU2NSw0LjUwOHoiIGZpbGw9IiM4MEQ4RkYiLz48L2c+PGcgaWQ9IlhNTElEXzEyNDRfIj48cGF0aCBkPSJNMi4xODUsMTZDNS4wNTIsMjMuNjM5LDE2LDI5LjQ5MiwxNiwyOS40OTJTMjYuOTQ4LDIzLjYzOSwyOS44MTUsMTZjMCwwLTIuNDQsMi0xMy44MTUsMiAgICAgIFMyLjE4NSwxNiwyLjE4NSwxNnoiIGZpbGw9IiNGRkYxNzYiLz48L2c+PGcgaWQ9IlhNTElEXzEyMDRfIj48cGF0aCBkPSJNMjkuOTQ1LDkuNTQyQzI5Ljk3OSw5LjgzOCwzMCwxMC4xMzgsMzAsMTAuNDQyYzAsMy4zNDEtMS44NzEsNi40ODEtNC4yNjksOS4xMzUgICAgICBjLTUuNDc0LDYuMDU3LTE1LjEyNCw1Ljk3Ni0yMC41NjMtMC4xMTJjLTEuNTI4LTEuNzEtMi44MzEtMy42MTktMy41NTYtNS42NTFDMi45MTMsMjIuNDkyLDE2LDI5LjQ5MiwxNiwyOS40OTIgICAgICBzMTQuNS03Ljc0OCwxNC41LTE3LjA1QzMwLjUsMTEuNDE4LDMwLjI5OSwxMC40NDEsMjkuOTQ1LDkuNTQyeiIgZmlsbD0iIzY1QzdFQSIvPjwvZz48ZyBpZD0iWE1MSURfMTI1MV8iPjxwYXRoIGQ9Ik0yOS44MTUsMTZjMCwwLTAuNDY5LDAuMzg0LTEuOTUzLDAuODE1Yy0wLjYyNSwwLjk2NS0xLjM0NSwxLjg5Mi0yLjEzMSwyLjc2MiAgICAgIGMtNS40NzQsNi4wNTctMTUuMTI0LDUuOTc2LTIwLjU2My0wLjExMkM0LjMsMTguNDkyLDMuNTIsMTcuNDUsMi44NjIsMTYuMzYzQzIuMzc1LDE2LjE0OSwyLjE4NSwxNiwyLjE4NSwxNiAgICAgIEM1LjA1MiwyMy42MzksMTYsMjkuNDkyLDE2LDI5LjQ5MlMyNi45NDgsMjMuNjM5LDI5LjgxNSwxNnoiIGZpbGw9IiNFQUQ5NjAiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8xMjAyXyI+PHBhdGggZD0iTTMwLjMwMiwxMC42OTdjLTAuNzk2LTMuNTQyLTMuOTU0LTYuMTg5LTcuNzM2LTYuMTg5Yy0yLjczLDAtNS4xMzksMS4zOC02LjU2NSwzLjQ4ICAgICBjLTEuNDI3LTIuMTAxLTMuODM1LTMuNDgtNi41NjYtMy40OEM1LjA1Miw0LjUwOCwxLjUsOC4wNiwxLjUsMTIuNDQyYzAsMS4zMzMsMC4zMDUsMi42MzIsMC44MTQsMy44ODJsMC4wMDEsMC4wMDEgICAgIGMtMC40NC0xLjcyLTAuNDcyLTMuNTExLDAuMjQyLTUuMzUzQzMuNDcsOC42MTYsNS41MzQsNi44MjEsNy45OTIsNi4yMzhjMy4yNTMtMC43NzEsNi4yODMsMC40Niw4LjEwNiwyLjcxMSAgICAgYzAuMjAxLDAuMjQ3LDAuNTc4LDAuMjc4LDAuNzc4LDAuMDI5YzEuNDU0LTEuODEyLDMuNjg2LTIuOTcxLDYuMTg4LTIuOTcxQzI2LjI5MSw2LjAwOCwyOS4wNjEsNy45MzUsMzAuMzAyLDEwLjY5N3oiIGZpbGw9IiM5RkU2RkYiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8xMTk4XyI+PGcgaWQ9IlhNTElEXzEyMDBfIj48cGF0aCBkPSJNNS40NDgsNi4wOGMtMC4xNzMsMC0wLjM0MS0wLjA5LTAuNDM0LTAuMjVDNC44NzYsNS41OTEsNC45NTgsNS4yODUsNS4xOTgsNS4xNDdMNS4zNSw1LjA2MiAgICAgYzAuMjQzLTAuMTM3LDAuNTQ1LTAuMDQ1LDAuNjc5LDAuMTk2QzYuMTYyLDUuNSw2LjA3NCw1LjgwNCw1LjgzMiw1LjkzN0w1LjY5OCw2LjAxM0M1LjYxOSw2LjA1OSw1LjUzMyw2LjA4LDUuNDQ4LDYuMDh6IiBmaWxsPSIjNDU1QTY0Ii8+PC9nPjxnIGlkPSJYTUxJRF8xMTk5XyI+PHBhdGggZD0iTTE2LDI5Ljk5MmMtMC4wODEsMC0wLjE2Mi0wLjAyLTAuMjM2LTAuMDU5QzE1LjE2MiwyOS42MTEsMSwyMS45MzUsMSwxMi40NDIgICAgIGMwLTIuMzA4LDAuOTE0LTQuNDYyLDIuNTczLTYuMDY1QzMuNzcyLDYuMTg2LDQuMDg4LDYuMTksNC4yOCw2LjM4OWMwLjE5MiwwLjE5OSwwLjE4NywwLjUxNi0wLjAxMiwwLjcwNyAgICAgQzIuODA2LDguNTEsMiwxMC40MDgsMiwxMi40NDJjMCw4LjI2MSwxMi4xNDMsMTUuNDMxLDE0LDE2LjQ3OWMxLjg1NS0xLjA0OCwxNC04LjIyMywxNC0xNi40NzljMC00LjEtMy4zMzUtNy40MzUtNy40MzUtNy40MzUgICAgIGMtMi40NjUsMC00Ljc2NSwxLjIxOS02LjE1MiwzLjI2MmMtMC4xODcsMC4yNzMtMC42NDEsMC4yNzMtMC44MjcsMGMtMS4zODctMi4wNDMtMy42ODctMy4yNjItNi4xNTMtMy4yNjIgICAgIGMtMC42MDEsMC0xLjE5NywwLjA3MS0xLjc3MSwwLjIxMmMtMC4yNywwLjA2My0wLjUzOS0wLjA5OC0wLjYwNS0wLjM2NkM2Ljk5Miw0LjU4NSw3LjE1Niw0LjMxNCw3LjQyNCw0LjI0OSAgICAgYzAuNjUzLTAuMTYsMS4zMjktMC4yNDEsMi4wMS0wLjI0MWMyLjU2NCwwLDQuOTcxLDEuMTYyLDYuNTY2LDMuMTQyYzEuNTk1LTEuOTc5LDQuMDAxLTMuMTQyLDYuNTY1LTMuMTQyICAgICBjNC42NTEsMCw4LjQzNSwzLjc4NCw4LjQzNSw4LjQzNWMwLDkuNDkyLTE0LjE2MiwxNy4xNjktMTQuNzY0LDE3LjQ5MUMxNi4xNjIsMjkuOTczLDE2LjA4MSwyOS45OTIsMTYsMjkuOTkyeiIgZmlsbD0iIzQ1NUE2NCIvPjwvZz48L2c+PC9nPjwvc3ZnPg==" alt="Ukrainian love">',
				); ?>
            </p>
            <style>
                #wl_informer_dashboard_widget .widget-copyright {
                    font-size: 10px;
                    text-align: center;
                    border-top: 1px #e3e3e3 solid;
                    margin-bottom: 0;
                    padding-top: 6px;
                }

                #wl_informer_dashboard_widget .widget-copyright img {
                    position: relative;
                    max-height: 11px;
                    top: 1px;
                }

                #wl_informer_dashboard_widget .widget-copyright a {
                    text-decoration: none;
                    color: unset;
                }

                #wl_informer_dashboard_widget ul {
                    display: flex;
                    margin: 20px 0;
                }

                #wl_informer_dashboard_widget ul li {
                    width: 50%;
                    float: left;
                }
            </style>
        </div>

		<?php

		echo ob_get_clean();
	}
}
