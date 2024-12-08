<?php
/**
 * Weather widget dashboard
 */

use function Env\env;

/**
 * Add 'Weather' widget to the dashboard.
 */
if ( ! function_exists( 'wl_add_to_dashboard_weather_widget_function' ) ) {
	function wl_add_to_dashboard_weather_widget_function() {
		if ( ! env( 'OPENWEATHERMAP_API_KEY' ) || ! env( 'IPINFO_API_TOKEN' ) || in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) {
			return;
		}

		wp_add_dashboard_widget(
			'wl_whether_dashboard_widget',
			esc_html__( 'Weather', WL_THEME_ADMIN_DOMAIN ),
			'wl_weather_widget_output_html_callback_function'
		);
	}

	add_action( 'wp_dashboard_setup', 'wl_add_to_dashboard_weather_widget_function', 20 );
}

/**
 * Render html weather informer
 */
if ( ! function_exists( 'wl_weather_widget_output_html_callback_function' ) ) {
	function wl_weather_widget_output_html_callback_function() {
		$weather_data  = wl_weather_widget_get_weather_data_function( 'weather' );
		$forecast_data = wl_weather_widget_get_weather_data_function( 'forecast' );

		ob_start();
		?>
        <div class="main">
            <section id="wl-weather-informer">
                <div class="ow-widget">
					<?php if ( $weather_data ) { ?>
                        <div class="ow-row">
                            <span class="ow-city-name"><?php echo esc_html( $weather_data['location'] ); ?></span>
                        </div>
                        <div class="ow-row">
                            <div class="wi ow-ico ow-ico-current pull-left<?php echo esc_attr( $weather_data['icon'] ); ?>"></div>
                            <div class="ow-temp-current pull-left"><?php echo esc_html( $weather_data['current_temp'] ); ?>
                                &deg
                            </div>
                            <div class="ow-current-desc">
                                <div>
                                    <svg style="max-height:20px;position:relative;top:5px" viewBox="0 0 100 100">
                                        <path d="M58.5,51.3V26.2c0-4.5-3.8-8.2-8.5-8.2s-8.5,3.7-8.5,8.2v25.1c-5.3,2.9-8.6,8.3-8.5,14.2C33,74.6,40.6,82,50,82   s17-7.4,17-16.5C67,59.6,63.8,54.2,58.5,51.3z M50,78.2c-7.2,0-13.1-5.7-13.1-12.7c0-4.9,2.9-9.3,7.4-11.4c0.7-0.3,1.1-1,1.1-1.7   V26.2c0-2.5,2.1-4.4,4.6-4.4c2.5,0,4.6,2,4.6,4.4v26.2c0,0.7,0.4,1.4,1.1,1.7c4.5,2.1,7.4,6.5,7.4,11.4   C63.1,72.5,57.2,78.2,50,78.2z"/>
                                        <path d="M50,59c-3.8,0-6.8,3-6.8,6.6c0,3.7,3.1,6.6,6.9,6.6c3.8,0,6.8-3,6.8-6.6C56.8,61.9,53.8,59,50,59z M50,68.5   c-1.6,0-3-1.3-3-2.9c0-1.6,1.3-2.9,3-2.9c1.6,0,3,1.3,3,2.9l0,0C53,67.2,51.6,68.5,50,68.5C50,68.5,50,68.5,50,68.5L50,68.5z"/>
                                    </svg>
                                    <span class="ow-pressure"><?php echo esc_html( $weather_data['pressure'] ); ?>hPa</span>
                                </div>
                                <div>
                                    <svg style="max-height:20px;position:relative;top:5px" viewBox="0 0 100 100">
                                        <path d="M50,82c-12.4,0-22.5-10.1-22.5-22.6c0-9,11.4-28.4,18.2-39c1.5-2.4,4.7-3.1,7.1-1.6c0.6,0.4,1.2,1,1.6,1.6   c6.8,10.7,18.2,30,18.2,39C72.4,71.9,62.4,82,50,82z M50,22.1c-0.3,0-0.7,0.2-0.8,0.5c-11,17.3-17.5,31.1-17.5,36.8   c0,10.1,8.2,18.4,18.3,18.4s18.4-8.2,18.4-18.4l0,0c0-5.8-6.5-19.5-17.5-36.8C50.7,22.3,50.2,22.1,50,22.1z"/>
                                    </svg>
                                    <span class="ow-humidity"><?php echo esc_html( $weather_data['humidity'] ); ?>%</span>
                                </div>
                                <div>
                                    <svg style="max-height:20px;position:relative;top:5px" viewBox="0 0 100 100">
                                        <path d="M65.3,60.1h-45c-1.1-0.2-2.1,0.5-2.4,1.6c-0.2,1.1,0.4,2.2,1.5,2.4c0.3,0.1,0.6,0.1,0.8,0H65c3.7,0.3,6.5,2.9,6.5,5.1  c0,2.8-0.7,5.4-5.9,5.9c-1.1,0.1-1.8,1.1-1.7,2.2c0.1,1,0.9,1.8,1.9,1.8H66c4.3-0.4,9.5-2.4,9.5-9.8C75.7,64.6,71,60.5,65.3,60.1z"/>
                                        <path d="M20.3,41.3h30.9c5.4,0,9.8-4.5,9.8-10.1c0-5.6-4.4-10.1-9.8-10.1c-1.1-0.2-2.1,0.4-2.4,1.5c-0.2,1.1,0.4,2.2,1.5,2.4  c0.3,0.1,0.6,0.1,0.9,0c3.3,0,6,2.7,6,6.1s-2.7,6.1-6,6.1H20.3c-1.1-0.2-2.1,0.4-2.4,1.5c-0.2,1.1,0.4,2.2,1.5,2.4  C19.7,41.3,20,41.3,20.3,41.3z"/>
                                        <path d="M71.9,32.3c-1.1-0.2-2.1,0.4-2.4,1.5c-0.2,1.1,0.4,2.2,1.5,2.4c0.3,0.1,0.6,0.1,0.9,0c3.3,0,6,2.7,6,6.1  c0,3.4-2.7,6.1-6,6.1H20.3c-1.1-0.2-2.1,0.5-2.4,1.6c-0.2,1.1,0.4,2.2,1.5,2.4c0.3,0.1,0.6,0.1,0.8,0h51.5c5.4,0.2,10-4.2,10.1-9.8  s-4.1-10.3-9.5-10.4C72.4,32.3,72.2,32.3,71.9,32.3z"/>
                                    </svg>
                                    <span class="ow-wind"><?php echo esc_html( $weather_data['wind'] ); ?>m/s</span>
                                </div>
                            </div>
                        </div>
					<?php } ?>
					<?php if ( $forecast_data ) { ?>
                        <div class="ow-row ow-forecast">
							<?php foreach ( $forecast_data as $day => $forecast ) { ?>
                                <div class="ow-forecast-item">
                                    <div class="ow-day">
										<?php _e( esc_html( date( 'D', $day ) ), WL_THEME_ADMIN_DOMAIN ); ?>
                                    </div>
                                    <div class="wi ow-ico ow-ico-forecast<?php echo esc_attr( $forecast['icon'] ); ?>"></div>
                                    <div class="ow-forecast-temp">
                                    <span class="max">
                                        <?php echo esc_html( $forecast['temp_max'] ); ?>&deg
                                    </span>
                                        <span class="min" style="font-size:small">
                                        <?php echo esc_html( $forecast['temp_min'] ); ?>&deg
                                    </span>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
					<?php } ?>
                </div>
            </section>
            <style>
                #wl-weather-informer {
                    position: relative;
                    overflow: hidden;
                    max-width: 500px;
                    margin: 15px auto 0 auto;
                }

                .ow-row {
                    position: relative;
                    overflow: hidden;
                    margin-bottom: 4%;
                }

                .ow-row:last-child {
                    margin-bottom: 0;
                }

                .ow-ico {
                    line-height: 1.1em;
                }

                .ow-widget {
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
                    font-size: 16px;
                    color: #646970;
                    padding: 2%;
                }

                .ow-widget .pull-left {
                    float: left;
                }

                .ow-widget .pull-right {
                    float: right;
                }

                .ow-city-name {
                    letter-spacing: 1px;
                    line-height: 1.111em;
                    font-weight: bold;
                    font-size: 24px;
                }

                .ow-ico-current {
                    font-size: 80px;
                    width: 1.1em;
                    padding-top: 13px;
                }

                .ow-temp-current {
                    font-size: 60px;
                    margin: 0 10%;
                }

                .ow-current-desc {
                    line-height: 1.5em;
                }

                .ow-forecast-item {
                    float: left;
                    width: calc(25% - 1px);
                    text-align: center;
                    border-right: 1px solid #646970;
                }

                .ow-forecast-item:last-child {
                    border-right: 0;
                }

                .ow-forecast-item .ow-ico-forecast {
                    font-size: 30px;
                    position: relative;
                    margin: 10px 0;
                }

                .ow-forecast-item .ow-forecast-temp span {
                    display: inline-block;
                    margin: 0 5px;
                }
            </style>
        </div>

		<?php

		echo ob_get_clean();
	}
}

/**
 * Adding custom icon 'Weather' dashboard widget.
 */
if ( ! function_exists( 'wl_load_weather_icons_admin_styles_function' ) ) {
	function wl_load_weather_icons_admin_styles_function() {
		wp_enqueue_style( 'weather-icons',
			'https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css', false, '1.0.0' );
	}

	add_action( 'admin_enqueue_scripts', 'wl_load_weather_icons_admin_styles_function' );
}

/**
 * OpenWeatherMap API get data
 *
 * @see https://openweathermap.org/api
 */
if ( ! function_exists( 'wl_weather_widget_get_weather_data_function' ) ) {
	function wl_weather_widget_get_weather_data_function( $data_collection = 'weather' ) {
		$api_key              = env( 'OPENWEATHERMAP_API_KEY' );
		$location             = wl_weather_widget_get_location_function();
		$units                = 'metric';
		$lang                 = wl_weather_widget_get_localisation_function();
		$available_collection = array( 'weather', 'forecast' );
		$cache_key            = 'wl_whether_forecast';

		if ( ! $location || ! in_array( $data_collection, $available_collection ) ) {
			return false;
		}

		if ( 'forecast' == $data_collection ) {
			$data = get_transient( $cache_key );
			if ( $data ) {
				return $data;
			}
		}

		$url = "http://api.openweathermap.org/data/2.5/{$data_collection}?q={$location}&units={$units}&lang={$lang}&appid={$api_key}";

		$response = wp_remote_get( $url );

		if ( 200 != wp_remote_retrieve_response_code( $response ) ) {
			return false;
		}

		$data = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( 'weather' == $data_collection ) {
			$weather_data['location']     = $data['name'];
			$weather_data['icon']         = wl_weather_widget_get_icon_function( $data['weather'][0]['icon'] );
			$weather_data['current_temp'] = round( (int) $data['main']['temp'] );
			$weather_data['pressure']     = $data['main']['pressure'];
			$weather_data['humidity']     = $data['main']['humidity'];
			$weather_data['wind']         = $data['wind']['speed'];

			return $weather_data;
		} else {
			$forecast_data = [];

			$temp_max = null;
			$temp_min = null;
			$i        = 1;

			foreach ( $data['list'] as $item ) {
				$item_date   = $item['dt'];
				$period_date = strtotime( "+{$i} day", strtotime( 'today 21:00' ) );

				if ( $item_date <= $period_date && $item_date > strtotime( 'today 21:00' ) ) {
					if ( $temp_max === null || $item['main']['temp'] > $temp_max ) {
						$temp_max = $item['main']['temp'];
					}
					if ( $temp_min === null || $item['main']['temp'] < $temp_min ) {
						$temp_min = $item['main']['temp'];
					}
				}
				if ( $item_date == $period_date ) {
					$forecast_data[ $item['dt'] ]['icon']     = wl_weather_widget_get_icon_function( $item['weather'][0]['icon'] );
					$forecast_data[ $item['dt'] ]['temp_max'] = round( (int) $temp_max );
					$forecast_data[ $item['dt'] ]['temp_min'] = round( (int) $temp_min );

					$temp_max = null;
					$temp_min = null;

					$i ++;
				}
			}

			set_transient( $cache_key, $forecast_data, strtotime( 'tomorrow' ) - time() );

			return $forecast_data;
		}
	}
}

/**
 * IP Geolocation API get user location
 *
 * @see https://ipinfo.io/developers
 */
if ( ! function_exists( 'wl_weather_widget_get_location_function' ) ) {
	function wl_weather_widget_get_location_function() {
		$token     = env( 'IPINFO_API_TOKEN' );
		$cache_key = 'wl_whether_city_' . get_current_user_id();
		$ip        = $_SERVER['REMOTE_ADDR'];
		$url       = "https://ipinfo.io/{$ip}?token={$token}";
		$location  = get_transient( $cache_key );
		if ( $location === false ) {
			$response = wp_remote_get( $url );
			if ( is_wp_error( $response ) ) {
				return false;
			}

			$data = json_decode( $response['body'], true );

			set_transient( $cache_key, $data['city'], 3600 * 24 );

			return $data['city'];
		} else {
			return esc_html( $location );
		}
	}
}

/**
 * OpenWeatherMap API get user localisation
 */
if ( ! function_exists( 'wl_weather_widget_get_localisation_function' ) ) {
	function wl_weather_widget_get_localisation_function() {
		$user_locale = get_user_locale();
		$locale_code = wl_wp_localisations( $user_locale );

		$available_locale = array(
			'af',
			'al',
			'ar',
			'az',
			'bg',
			'ca',
			'cz',
			'da',
			'de',
			'el',
			'en',
			'eu',
			'fa',
			'fi',
			'gl',
			'he',
			'hi',
			'hr',
			'hu',
			'id',
			'it',
			'ja',
			'kr',
			'la',
			'lt',
			'mk',
			'no',
			'nl',
			'pl',
			'pt',
			'pt_br',
			'ro',
			'ru',
			'sv',
			'se',
			'sk',
			'sl',
			'sp',
			'sp',
			'es',
			'sr',
			'th',
			'tr',
			'ua',
			'uk',
			'vi',
			'zh_cn',
			'zh_tw',
			'zu',
		);


		if ( in_array( $locale_code, $available_locale ) ) {
			return $locale_code;
		}

		return 'en';
	}
}

/**
 * OpenWeatherMap API get weather icon
 */
if ( ! function_exists( 'wl_weather_widget_get_icon_function' ) ) {
	function wl_weather_widget_get_icon_function( $icon_code ) {
		switch ( $icon_code ) {
			case '01d':
			case '01n':
				return ' wi-day-sunny';
			case '02d':
			case '02n':
				return ' wi-day-cloudy';
			case '03d':
			case '03n':
				return ' wi-cloud';
			case '04d':
			case '04n':
				return ' wi-cloudy';
			case '09d':
			case '09n':
				return ' wi-rain';
			case '10d':
			case '10n':
				return ' wi-day-rain';
			case '11d':
			case '11n':
				return ' wi-thunderstorm';
			case '13d':
			case '13n':
				return ' wi-snow';
			case '50d':
			case '50n':
				return ' wi-fog';
			default:
				return null;
		}
	}
}
