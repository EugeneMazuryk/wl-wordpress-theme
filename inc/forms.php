<?php
/**
 * Send site messages functions which enhance the theme
 */

use function Env\env;

/**
 * Ajax send forms
 */
if ( ! function_exists( 'wl_form_send_ajax_function' ) ) {
	function wl_form_send_ajax_function() {
		$data   = array();
		$errors = array();

		// Collecting all POST data dynamically
		foreach ( $_POST as $key => $value ) {
			$data[ $key ] = sanitize_text_field( $value );
		}

		// Adding additional data
		$data['date']       = date_i18n( 'Y-m-d H:i:s', current_time( 'timestamp' ) );
		$data['referer']    = sanitize_text_field( wp_get_referer() );
		$data['ip_address'] = sanitize_text_field( wl_get_ip() );
		$data['file']       = '';

		// Validation rules (defined separately)
		$validation_rules = wl_forms_validation_rules( $data );
		foreach ( $validation_rules as $field => $rule ) {
			// Nonce Form Validation
			if ( isset( $rule['nonce'] ) && ! $rule['nonce'] ) {
				$errors[ $field ] = $rule['messages']['nonce'];
			} // Required Field Validation
			elseif ( isset( $rule['required'] ) && $rule['required'] ) {
				$errors[ $field ] = $rule['messages']['required'];
			} // Text Max Length Validation
			elseif ( isset( $rule['max_length'] ) && mb_strlen( $data[ $field ] ) > $rule['max_length'] ) {
				$errors[ $field ] = $rule['messages']['max_length'];
			} // Email Validation
			elseif ( isset( $rule['email'] ) && $rule['email'] && ! filter_var( $data[ $field ], FILTER_VALIDATE_EMAIL ) ) {
				$errors[ $field ] = $rule['messages']['email'];
			} // Text Length Validation
			elseif ( isset( $rule['length'] ) && strlen( preg_replace( '/[^a-zA-Z0-9]/', '', $data[ $field ] ) ) != $rule['length'] ) {
				$errors[ $field ] = $rule['messages']['length'];
			} // Google reCAPTCHA Validation
			elseif ( isset( $rule['g_recaptcha'] ) && ! $rule['g_recaptcha'] ) {
				$errors[ $field ] = $rule['messages']['g_recaptcha'];
			} // CloudFlare Turnstile CAPTCHA Validation
			elseif ( isset( $rule['turnstile'] ) && ! $rule['turnstile'] ) {
				$errors[ $field ] = $rule['messages']['turnstile'];
			}
		}

		// Handling file upload
		if ( isset( $_FILES['file'] ) && 0 < $_FILES['file']['size'] && empty( $errors ) ) {
			$file_upload_result = wl_preparing_attach_files( $_FILES );
			if ( empty( $file_upload_result ) ) {
				$errors['file'] = __( 'Error uploading file.', THEME_DOMAIN );
			} else {
				$data['file'] = $file_upload_result;
			}
		}

		if ( empty( $errors ) ) {
			// Thank You page url
			$thanks_url = defined( 'POLYLANG_BASENAME' )
				? get_page_link( pll_get_post( wl_get_page_id_by_template( 'thanks' ), pll_current_language() ) )
				: ( wl_get_page_link_by_template( 'thanks' ) ? wl_get_page_link_by_template( 'thanks' ) : home_url() );

			// Send Message
			$result = array(
				'message'    => __( 'Message sent!', THEME_DOMAIN ),
				'url'        => $thanks_url,
				'email_send' => wl_send_email( $data ),
				//'telegram_send' => wl_send_telegram( $data ),
				//'slack_send'    => wl_send_slack( $data )
			);

			// WL Forms DB Plugin
			if ( defined( 'WL_FORMS_DB_DOMAIN' ) ) {
				wl_forms_db_add( $data );
			}

			wp_send_json_success( $result );
		} else {
			$errors['message'] = __( 'Check that the form data is filled in correctly.', THEME_DOMAIN );
			wp_send_json_error( $errors );
		}
	}

	add_action( 'wp_ajax_wl_form_send', 'wl_form_send_ajax_function' );
	add_action( 'wp_ajax_nopriv_wl_form_send', 'wl_form_send_ajax_function' );
}

/**
 * Forms data validation
 */
if ( ! function_exists( 'wl_forms_validation_rules' ) ) {
	function wl_forms_validation_rules( $data = null ) {
		$rules = array();

		//WordPress Ajax Nonce
		$rules['nonce'] = array(
			'nonce'    => wp_verify_nonce( $data['nonce'], 'wl_form_nonce' ),
			'messages' => array(
				'nonce' => __( 'Invalid nonce verification.', THEME_DOMAIN ),
			)
		);

		//Google reCAPTCHA
		//$rules['g_recaptcha'] = wl_g_recaptcha( $data['g-recaptcha'] );

		//CloudFlare Turnstile
		//$rules['turnstile'] = wl_cloudflare_turnstile( $data['cf-turnstile-response'] );

		switch ( $data['form_id'] ) {
			case 'default-form':
				$rules['user-name'] = array(
					'required'   => empty( $data['user-name'] ),
					'max_length' => 200,
					'messages'   => array(
						'required'   => __( 'Required field.', THEME_DOMAIN ),
						'max_length' => sprintf( __( 'The value cannot be more than %d characters.', THEME_DOMAIN ), 20 ),
					)
				);
				$rules['email']     = array(
					'required' => empty( $data['email'] ),
					'email'    => true,
					'messages' => array(
						'required' => __( 'Required field.', THEME_DOMAIN ),
						'email'    => __( 'Check email address.', THEME_DOMAIN ),
					),
				);
				$rules['phone']     = array(
					'required' => empty( $data['phone'] ),
					'length'   => 12,
					'messages' => array(
						'required' => __( 'Required field.', THEME_DOMAIN ),
						'length'   => __( 'Check phone number.', THEME_DOMAIN ),
					),
				);
				$rules['text']      = array(
					'required' => empty( $data['text'] ),
					'messages' => array(
						'required' => __( 'Required field.', THEME_DOMAIN ),
					),
				);
				break;
			default:
				$rules['user-name'] = array(
					'required'   => empty( $data['user-name'] ),
					'max_length' => 200,
					'messages'   => array(
						'required'   => __( 'Required field.', THEME_DOMAIN ),
						'max_length' => sprintf( __( 'The value cannot be more than %d characters.', THEME_DOMAIN ), 20 ),
					)
				);
				$rules['phone']     = array(
					'required' => empty( $data['phone'] ),
					'length'   => 12,
					'messages' => array(
						'required' => __( 'Required field.', THEME_DOMAIN ),
						'length'   => __( 'Check phone number.', THEME_DOMAIN ),
					),
				);
		}

		return $rules;
	}
}

/**
 * Send Email messages
 */
if ( ! function_exists( 'wl_send_email' ) ) {
	function wl_send_email( $data ) {
		$site_email = 'info@' . wl_get_site_url();

		$headers = 'From: ' . get_bloginfo( 'name' ) . ' <' . $site_email . '>' . "\r\n";
		$to      = array(
			get_bloginfo( 'admin_email' ),
		);

		$subject = ( $data['title'] ?? null ) . ' ';

		$message = wl_preparing_message( $data );

		$attach_file = $data['file'];

		if ( ! wp_mail( $to, $subject, $message, $headers, $attach_file ) ) {
			error_log( 'Email message error: ' . print_r( error_get_last(), true ) );

			return 'Error sending message to Email, check the debug.log file!';
		}

		return 'Message sent to Email!';
	}
}

/**
 * Send Telegram messages
 */
if ( ! function_exists( 'wl_send_telegram' ) ) {
	function wl_send_telegram( $data ) {
		$token   = env( 'TELEGRAM_API_TOKEN' );
		$chat_id = env( 'TELEGRAM_CHAT_ID' );
		$url     = 'https://api.telegram.org/bot' . $token . '/sendMessage';

		$data = array(
			'chat_id' => $chat_id,
			'text'    => wl_preparing_message( $data )
		);

		$args = array(
			'body'    => wp_json_encode( $data ),
			'headers' => array(
				'Content-Type' => 'application/json',
			),
		);

		// Send curl post
		$response = wp_remote_post( $url, $args );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			error_log( 'Send Telegram messages error: ' . $error_message );

			return 'Error sending message to Telegram, check the debug.log file!';
		}

		$response_body = json_decode( wp_remote_retrieve_body( $response ), 1 );

		if ( ! $response_body['ok'] ) {
			error_log( 'Send Telegram messages error: ' . print_r( $response_body, true ) );

			return 'Error sending message to Telegram, check the debug.log file!';
		}

		return 'Message sent to Telegram!';
	}
}

/**
 * Send SMS messages
 */
if ( ! function_exists( 'wl_send_sms' ) ) {
	function wl_send_sms( $data ) {
		if ( isset( $data['phone'] ) ) {
			$user_id  = '380000000000'; //User ID (phone number) string(12)
			$password = ''; //User Password
			$from     = ''; //Sender Alpha-Name
			$phone    = preg_replace( '![^0-9]+!', '', $data['phone'] );
			$text     = urlencode( iconv( 'utf-8', 'windows-1251', 'Message text' ) );
			$url      = 'https://gate.smsclub.mobi/http/?' . 'username=' . $user_id . '&password=' . $password . '&from=' . urlencode( $from ) . '&to=' . $phone . '&text=' . $text;

			if ( $curl = curl_init() ) {
				curl_setopt( $curl, CURLOPT_URL, $url );
				curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, false );
				curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );

				$server_response = curl_exec( $curl );
				curl_close( $curl );

				$server_response = json_decode( $server_response, 1 );

				if ( ! isset( $server_response['error'] ) ) {
					return $server_response['result'];
				}
			}
		}

		return false;
	}
}

/**
 * Send Slack messages
 */
if ( ! function_exists( 'wl_send_slack' ) ) {
	function wl_send_slack( $data ) {
		$webhook_url = 'https://hooks.slack.com/services/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';

		$data = array(
			'text' => wl_preparing_message( $data )
		);

		$args = array(
			'body'    => wp_json_encode( $data ),
			'headers' => array(
				'Content-Type' => 'application/json',
			),
		);

		// Send curl post
		$response = wp_remote_post( $webhook_url, $args );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			error_log( 'Send Slack messages error: ' . $error_message );

			return 'Error sending message to Slack, check the debug.log file!';
		}

		$response_body = json_decode( wp_remote_retrieve_body( $response ), 1 );

		if ( ! $response_body['ok'] ) {
			error_log( 'Send Slack messages error: ' . print_r( $response_body, true ) );

			return 'Error sending message to Slack, check the debug.log file!';
		}

		return 'Message sent to Slack!';
	}
}

/**
 * Preparing message
 */
if ( ! function_exists( 'wl_preparing_message' ) ) {
	function wl_preparing_message( $data ) {
		if ( isset( $data['user-name'] ) && ! empty( $data['user-name'] ) ) {
			$message = __( 'Name', THEME_DOMAIN ) . ': ' . $data['user-name'] . PHP_EOL;
		}
		if ( isset( $data['email'] ) && ! empty( $data['email'] ) ) {
			$message .= __( 'Email', THEME_DOMAIN ) . ': ' . $data['email'] . PHP_EOL;
		}
		if ( isset( $data['phone'] ) && ! empty( $data['phone'] ) ) {
			$message .= __( 'Phone', THEME_DOMAIN ) . ': ' . $data['phone'] . PHP_EOL;
		}
		if ( isset( $data['text'] ) && ! empty( $data['text'] ) ) {
			$message .= PHP_EOL . __( 'Message', THEME_DOMAIN ) . PHP_EOL . $data['text'] . PHP_EOL;
		}

		$message .= PHP_EOL;

		// Check UTM Tags
		if ( isset( $data['utm_source'] ) && ! empty( $data['utm_source'] ) ) {
			$message .= __( 'UTM Source', THEME_DOMAIN ) . ': ' . $data['utm_source'] . PHP_EOL;
		}
		if ( isset( $data['utm_medium'] ) && ! empty( $data['utm_medium'] ) ) {
			$message .= __( 'UTM Medium', THEME_DOMAIN ) . ': ' . $data['utm_medium'] . PHP_EOL;
		}
		if ( isset( $data['utm_campaign'] ) && ! empty( $data['utm_campaign'] ) ) {
			$message .= __( 'UTM Campaign', THEME_DOMAIN ) . ': ' . $data['utm_campaign'] . PHP_EOL;
		}
		if ( isset( $data['utm_term'] ) && ! empty( $data['utm_term'] ) ) {
			$message .= __( 'UTM Term', THEME_DOMAIN ) . ': ' . $data['utm_term'] . PHP_EOL;
		}
		if ( isset( $data['utm_content'] ) && ! empty( $data['utm_content'] ) ) {
			$message .= __( 'UTM Content', THEME_DOMAIN ) . ': ' . $data['utm_content'] . PHP_EOL;
		}

		$message .= PHP_EOL;

		return $message;
	}
}

/**
 * Preparing attach files
 */
if ( ! function_exists( 'wl_preparing_attach_files' ) ) {
	function wl_preparing_attach_files( $data ) {
		$attach_file = '';

		if ( 0 < $data['file']['size'] ) {
			$allowed_extensions = array( 'jpg', 'png', 'pdf', 'txt' );
			$max_file_size      = 10 * 1024 * 1024; //10 Мb

			$extension = pathinfo( $data['file']['name'], PATHINFO_EXTENSION );
			if ( in_array( $extension, $allowed_extensions ) && $data['file']['size'] < $max_file_size ) {
				$file_name   = 'wl_form_' . uniqid() . '_' . $data['file']['name'];
				$destination = trailingslashit( THEME_UPLOADS_DIR ) . $file_name;

				if ( move_uploaded_file( $data['file']['tmp_name'], $destination ) ) {
					$attach_file = $destination;
				}
			}

			if ( file_exists( $data['file']['tmp_name'] ) && is_uploaded_file( $data['file']['tmp_name'] ) ) {
				unlink( $data['file']['tmp_name'] );
			}
		}

		return $attach_file;
	}
}

/**
 * Google reCAPTCHA validation
 */
if ( ! function_exists( 'wl_g_recaptcha' ) ) {
	function wl_g_recaptcha( $data ) {
		$validation = true;
		$error      = false;

		if ( empty( $data ) ) {
			$validation = false;
			$error      = __( 'Google reCAPTCHA not found RESPONSE' );
		}

		$secret   = env( 'GOOGLE_RECAPTCHA_SECRET_KEY' );
		$response = sanitize_text_field( $data );
		$url      = 'https://www.google.com/recaptcha/api/siteverify';

		$verify_response = wp_remote_post( $url,
			array(
				'body' => array(
					'secret'   => $secret,
					'response' => $response,
				),
			)
		);

		$response_body = json_decode( wp_remote_retrieve_body( $verify_response ), true );

		if ( is_wp_error( $verify_response ) || ! $response_body['success'] ) {
			$validation = false;
			$error      = sprintf( __( 'Google reCAPTCHA error: %s', THEME_DOMAIN ), $response_body['error-codes'][0] );
		}

		return array(
			'g_recaptcha' => $validation,
			'messages'    => array(
				'g_recaptcha' => $error,
			)
		);
	}
}

/**
 * CloudFlare Turnstile CAPTCHA validation
 */
if ( ! function_exists( 'wl_cloudflare_turnstile' ) ) {
	function wl_cloudflare_turnstile( $data ) {
		$validation = true;
		$error      = false;

		if ( empty( $data ) ) {
			$validation = false;
			$error      = __( 'CloudFlare Turnstile CAPTCHA not found RESPONSE' );
		}

		$secret    = env( 'CLOUDFLARE_TURNSTILE_SECRET_KEY' );
		$response  = sanitize_text_field( $data );
		$remote_ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] );
		$url       = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

		$verify_response = wp_remote_post( $url, array(
			'body'    => array(
				'secret'   => $secret,
				'response' => $response,
				'remoteip' => $remote_ip,
			),
			'headers' => array(
				'Content-Type' => 'application/x-www-form-urlencoded',
			),
		) );

		$response_body = json_decode( wp_remote_retrieve_body( $verify_response ), true );

		if ( is_wp_error( $verify_response ) || ! $response_body['success'] ) {
			$validation = false;
			$error      = sprintf( __( 'CloudFlare Turnstile CAPTCHA error: %s', THEME_DOMAIN ), $response_body['error-codes'][0] );
			error_log( 'CloudFlare Turnstile CAPTCHA error: ' . $verify_response->get_error_message() );
		}

		return array(
			'turnstile' => $validation,
			'messages'  => array(
				'turnstile' => $error,
			)
		);
	}
}

/**
 * Date validation
 */
if ( ! function_exists( 'wl_date_validation' ) ) {
	function wl_date_validation( $date, $format = 'd-m-Y' ) {
		$date = str_replace( ' ', '', $date );
		$d    = DateTime::createFromFormat( $format, $date );

		// Check date format
		if ( ! $d || $d->format( $format ) !== $date ) {
			return false;
		}

		// Check for age
		$now      = new DateTime();
		$interval = $now->diff( $d );

		if ( $interval->y < 16 ) {
			return false;
		}

		return true;
	}
}

/**
 *  Phone operator code validation
 */
if ( ! function_exists( 'wl_phone_operator_code_validation' ) ) {
	function wl_phone_operator_code_validation( $phone_number ) {
		$digits_only = preg_replace( '/\D/', '', $phone_number );

		if ( strlen( $digits_only ) == 12 && substr( $digits_only, 0, 3 ) == '380' ) {
			$operator_code = substr( $digits_only, 3, 2 );
		} else {
			return false;
		}

		return wl_mobile_operators_codes_ua( (int) $operator_code );
	}
}

/**
 *  Email domain validation
 */
if ( ! function_exists( 'wl_email_domain_validation' ) ) {
	function wl_email_domain_validation( $email ) {
		$blocked_domains = array(
			'mail.ru',
			'yandex.ru',
			'rambler.ru',
			'bk.ru',
			'list.ru',
			'inbox.ru',
			'yandex.com',
			'qip.ru'
		);

		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			return true;
		}

		$email_domain = substr( strrchr( $email, "@" ), 1 );

		if ( in_array( $email_domain, $blocked_domains ) ) {
			return true;
		}

		return false;
	}
}

/**
 * Codes of mobile operators in Ukraine
 */
if ( ! function_exists( 'wl_mobile_operators_codes_ua' ) ) {
	function wl_mobile_operators_codes_ua( $code ) {
		$operators = array(
			array(
				'operator' => 'Інтертелеком',
				'codes'    => array( 20, 89, 94 ),
			),
			array(
				'operator' => 'Київстар',
				'codes'    => array( 39, 67, 68, 77, 96, 97, 98 ),
			),
			array(
				'operator' => 'Vodafone',
				'codes'    => array( 50, 66, 75, 95, 99 ),
			),
			array(
				'operator' => 'Lifecell',
				'codes'    => array( 63, 73, 93 ),
			),
			array(
				'operator' => 'Укртелеком',
				'codes'    => array( 91 ),
			),
			array(
				'operator' => 'PEOPLEnet',
				'codes'    => array( 92 ),
			),
		);

		foreach ( $operators as $operator ) {
			if ( in_array( $code, $operator['codes'] ) ) {
				return $operator;
			}
		}

		return false;
	}
}
