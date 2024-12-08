<?php
/**
 * Main documentation view layout
 */

global $wp_version;
global $wp_theme;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title><?php echo esc_html( $wp_theme->get( 'Name' ) ); ?> | <?php esc_html_e( 'Documentation' ); ?></title>

	<?php wp_site_icon(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>fonts/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>css/stroke.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>css/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/syntax-highlighter/styles/shThemeRDark.css" media="all">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i>
</button>

<script>
	var mybutton = document.getElementById( "myBtn" );
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	function topFunction() {
		window.scrollTo( {top: 0, behavior: 'smooth'} )
		document.documentElement.scrollTo( {top: 0, behavior: 'smooth'} )
	}

	document.addEventListener( "DOMContentLoaded", () => {
		document.querySelector( '#mode' ).addEventListener( 'click', () => {
			document.querySelector( 'html' ).classList.toggle( 'dark' );
		} )
	} );
</script>

<div id="wrapper">
    <div id="mode">
        <div class="dark">
            <svg aria-hidden="true" viewBox="0 0 512 512">
                <title><?php _e( 'Light mode', WL_THEME_DOCUMENTATION_DOMAIN ); ?></title>
                <path fill="currentColor" d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"></path>
            </svg>
        </div>
        <div class="light">
            <svg aria-hidden="true" viewBox="0 0 512 512">
                <title><?php _e( 'Dark mode', WL_THEME_DOCUMENTATION_DOMAIN ); ?></title>
                <path fill="currentColor" d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"></path>
            </svg>
        </div>
    </div>
    <div class="container">

        <section id="top" class="section docs-heading">
            <div class="row">
                <div class="col-md-12">
                    <div class="big-title text-center">
                        <h1><?php _e( 'Theme documentation', WL_THEME_DOCUMENTATION_DOMAIN ); ?></h1>
                    </div>
                </div>
            </div>
            <hr>
        </section>

        <div class="row">
            <div class="col-md-3">

                <!-- Sidebar menu -->
                <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
                    <ul class="nav">
                        <li>
                            <a href="#wl-settings">
								<?php _e( 'How to Use Theme', WL_THEME_DOCUMENTATION_DOMAIN ); ?>
                            </a>
                            <ul class="nav">
                                <li>
                                    <a href="#wl-settings_theme"><?php _e( 'Theme Options',
											WL_THEME_DOCUMENTATION_DOMAIN ); ?></a>
                                </li>
                                <li>
                                    <a href="#wl-settings_menu"><?php _e( 'Menu Options',
											WL_THEME_DOCUMENTATION_DOMAIN ); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#wl-plugins"><?php _e( 'Recommended Plugins', WL_THEME_DOCUMENTATION_DOMAIN ); ?></a>
                        </li>
                        <li>
                            <a href="#wl-sources"><?php _e( 'Files & Sources', WL_THEME_DOCUMENTATION_DOMAIN ); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_admin_url() ); ?>">
								<?php printf( __( '%s Go back', WL_THEME_DOCUMENTATION_DOMAIN ),
									'<i class="fa fa-wordpress"></i>' ); ?>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- end Sidebar menu -->

            </div>
            <div class="col-md-9">

                <!-- Main section -->
                <section class="welcome">
                    <div class="row">
                        <div class="col-md-12 left-align">
                            <div class="row">
                                <div class="col-md-12 full">
                                    <div class="intro1">
                                        <ul>
                                            <li>
                                                <strong><?php _e( 'Theme Name', WL_THEME_DOCUMENTATION_DOMAIN ); ?>:&nbsp;</strong>
												<?php esc_html_e( $wp_theme->get( 'Name' ) ); ?>
                                            </li>
                                            <li>
                                                <strong><?php _e( 'Theme Description',
														WL_THEME_DOCUMENTATION_DOMAIN ); ?>:&nbsp;</strong>
												<?php esc_html_e( $wp_theme->get( 'Description' ) ); ?>
                                            </li>
                                            <li>
                                                <strong><?php _e( 'Theme Version', WL_THEME_DOCUMENTATION_DOMAIN ); ?>:&nbsp;</strong>
												<?php esc_html_e( $wp_theme->get( 'Version' ) ); ?>
                                            </li>
                                            <li>
                                                <strong><?php _e( 'Author', WL_THEME_DOCUMENTATION_DOMAIN ); ?>
                                                    :&nbsp;</strong>
                                                <a href="<?php echo esc_url( $wp_theme->get( 'AuthorURI' ) ) ?>" target="_blank"><?php esc_html_e( $wp_theme->get( 'Author' ) ); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 left-align">
                                        <h3>
											<?php printf( __( '%s Information', WL_THEME_DOCUMENTATION_DOMAIN ), '<i class="fa fa-info-circle"></i>' ); ?>
                                        </h3>
                                    </div>
                                    <div class="intro clearfix">
                                        <ul>
                                            <li>
												<?php printf( __( '%s WordPress: %s', WL_THEME_DOCUMENTATION_DOMAIN ), '<i class="fa fa-chevron-right"></i>', $wp_version ); ?>
                                            </li>
                                            <li>
												<?php printf( __( '%s PHP: %s', WL_THEME_DOCUMENTATION_DOMAIN ), '<i class="fa fa-chevron-right"></i>', PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION ); ?>
                                            </li>
                                            <li>
												<?php printf( __( '%s OS: %s', WL_THEME_DOCUMENTATION_DOMAIN ), '<i class="fa fa-chevron-right"></i>', PHP_OS_FAMILY ); ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <div class="intro2 clearfix">
                                            <p>
												<?php printf( __( '%s Be careful while editing the template. If not edited properly, the design layout may break completely.',
													WL_THEME_DOCUMENTATION_DOMAIN ),
													'<i class="fa fa-exclamation-triangle"></i>' ); ?>
                                                <br>
												<?php _e( 'No support is provided for faulty customization.',
													WL_THEME_DOCUMENTATION_DOMAIN ) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end Main section -->

				<?php
				/**
				 * Get content with translations
				 */
				if ( file_exists( WL_THEME_DOCUMENTATION_DIR . '/template-parts/content-' . get_user_locale() . '.php' ) ) {
					require_once WL_THEME_DOCUMENTATION_DIR . '/template-parts/content-' . get_user_locale() . '.php';
				} else {
					require_once WL_THEME_DOCUMENTATION_DIR . '/template-parts/content.php';
				} ?>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/jquery.min.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/retina.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/jquery.fitvids.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/wow.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/jquery.prettyPhoto.js"></script>

<!-- CUSTOM PLUGINS -->
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/custom.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/main.js"></script>

<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/syntax-highlighter/scripts/shCore.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/syntax-highlighter/scripts/shBrushXml.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/syntax-highlighter/scripts/shBrushCss.js"></script>
<script src="<?php echo esc_url( WL_THEME_DOCUMENTATION_ASSETS_URL ); ?>js/syntax-highlighter/scripts/shBrushJScript.js"></script>

</body>

</html>
