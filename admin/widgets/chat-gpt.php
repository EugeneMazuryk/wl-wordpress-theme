<?php
/**
 * ChatGPT widget in dashboard
 */

use function Env\env;

/**
 * Add 'ChatGPT' widget to the dashboard.
 */
if ( ! function_exists( 'wl_add_to_dashboard_chat_gpt_widget_function' ) ) {
	function wl_add_to_dashboard_chat_gpt_widget_function() {
		if ( ! env( 'CHAT_GPT_API_KEY' ) ) {
			return;
		}

		wp_add_dashboard_widget(
			'wl_chat_gpt_dashboard_widget',
			esc_html__( 'ChatGPT', WL_THEME_ADMIN_DOMAIN ),
			'wl_chat_gpt_widget_output_html_callback_function'
		);
	}

	add_action( 'wp_dashboard_setup', 'wl_add_to_dashboard_chat_gpt_widget_function', 20 );
}

/**
 * Render html ChatGPT informer
 */
if ( ! function_exists( 'wl_chat_gpt_widget_output_html_callback_function' ) ) {
	function wl_chat_gpt_widget_output_html_callback_function() {
		ob_start();
		?>
        <div class="main">
            <section class="msger">
                <main class="msger-chat"></main>
                <form class="msger-inputarea">
                    <input type="text" class="msger-input"
                           placeholder="<?php _e( 'Enter your message...', WL_THEME_ADMIN_DOMAIN ); ?>">
                    <button type="submit" class="msger-send-btn">
						<?php _e( 'Send', WL_THEME_ADMIN_DOMAIN ); ?>
                    </button>
                </form>
            </section>

            <style>
                .msger {
                    display: flex;
                    flex-flow: column wrap;
                    justify-content: space-between;
                    width: 100%;
                }

                .msger-chat {
                    flex: 1;
                    overflow-y: auto;
                    padding: 0;
                    max-height: 300px;
                }

                .msger-chat::-webkit-scrollbar {
                    width: 6px;
                }

                .msger-chat::-webkit-scrollbar-track {
                    background: #ddd;
                }

                .msger-chat::-webkit-scrollbar-thumb {
                    background: #bdbdbd;
                }

                .msg {
                    display: flex;
                    align-items: flex-end;
                    margin-bottom: 10px;
                    padding-right: 10px;
                }

                .msg-img {
                    width: 50px;
                    height: 50px;
                    margin-right: 10px;
                    background: #bfbfbf;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    border-radius: 50%;
                }

                .msg-bubble {
                    max-width: 450px;
                    padding: 15px;
                    border-radius: 15px;
                    background: #ececec;
                }

                .msg-info {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 10px;
                }

                .msg-info-name {
                    margin-right: 10px;
                    font-weight: bold;
                }

                .msg-info-time {
                    font-size: 0.85em;
                }

                .left-msg .msg-bubble {
                    border-bottom-left-radius: 0;
                }

                .right-msg {
                    flex-direction: row-reverse;
                }

                .right-msg .msg-bubble {
                    background: #579ffb;
                    color: #fff;
                    border-bottom-right-radius: 0;
                }

                .right-msg .msg-img {
                    margin: 0 0 0 10px;
                }

                .msger-inputarea {
                    display: flex;
                    padding: 10px 0;
                }

                .msger-inputarea * {
                    padding: 10px;
                    border: none;
                    border-radius: 3px;
                    font-size: 1em;
                }

                .msger-input {
                    flex: 1;
                    background: #ddd;
                }

                .msger-send-btn {
                    margin-left: 10px;
                    background: #2271b1;
                    color: #fff;
                    font-weight: bold;
                    cursor: pointer;
                    transition: background 0.23s;
                }

                .msger-send-btn:hover {
                    background: #135e96;
                }

                @media (min-width: 800px) {
                    .left-msg .msg-img {
                        max-width: 50px;
                        width: 100%;
                    }

                    .left-msg .msg-bubble {
                        width: 100%;
                    }
                }

                @media (max-width: 576px) {
                    .left-msg .msg-img {
                        max-width: 50px;
                        width: 100%;
                    }

                    .left-msg .msg-bubble {
                        width: 100%;
                    }
                }
            </style>

			<?php
			$user_id   = get_current_user_id();
			$user_info = get_userdata( $user_id );
			$username  = $user_info->user_login;
			$avatar    = get_avatar_url( $user_id );
			?>

            <script>
                const msgerForm = get(".msger-inputarea");
                const msgerInput = get(".msger-input");
                const msgerChat = get(".msger-chat");
                const BOT_IMG = "data:image/png;base64,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";
                const PERSON_IMG = "<?php echo $avatar; ?>";
                const BOT_NAME = "Bot";
                const PERSON_NAME = "<?php echo $username; ?>";

                msgerForm.addEventListener("submit", (event) => {
                    event.preventDefault();

                    const msgText = msgerInput.value;
                    if (!msgText) return;

                    appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
                    msgerInput.value = "";

                    botResponse(msgText);
                });

                function appendMessage(name, img, side, text) {
                    //   Simple solution for small apps
                    const msgHTML = `
                        <div class="msg ${side}-msg">
                          <div class="msg-img" style="background-image: url(${img})"></div>

                          <div class="msg-bubble">
                            <div class="msg-info">
                              <div class="msg-info-name">${name}</div>
                              <div class="msg-info-time">${formatDate(new Date())}</div>
                            </div>

                            <div class="msg-text">${text}</div>
                          </div>
                        </div>
                    `;

                    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
                    msgerChat.scrollTop += 500;
                }

                function botResponse(msgText) {
                    let dataObj = {
                        action: 'chat_gpt_ajax',
                        chat_gpt_data: msgText,
                    }

                    let array = [];
                    Object.keys(dataObj).forEach(element =>
                        array.push(
                            encodeURIComponent(element) + "=" + encodeURIComponent(dataObj[element])
                        )
                    );

                    let data = array.join("&");

                    let xhttp = new XMLHttpRequest();

                    xhttp.open("POST", ajaxurl, true);

                    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            let parsed = JSON.parse(this.response);
                            const delay = msgText.split(" ").length * 100;
                            setTimeout(() => {
                                appendMessage(BOT_NAME, BOT_IMG, "left", parsed.data.result);
                            }, delay);
                        }
                    };

                    xhttp.send(data);
                }

                // Utils
                function get(selector, root = document) {
                    return root.querySelector(selector);
                }

                function formatDate(date) {
                    const h = "0" + date.getHours();
                    const m = "0" + date.getMinutes();

                    return `${h.slice(-2)}:${m.slice(-2)}`;
                }

                function random(min, max) {
                    return Math.floor(Math.random() * (max - min) + min);
                }

            </script>
        </div>

		<?php

		echo ob_get_clean();
	}
}

/**
 * ChatGPT API get data
 *
 * @see https://platform.openai.com
 */
if ( ! function_exists( 'wl_chat_gpt_get_data_function' ) ) {
	function wl_chat_gpt_get_data_function( $prompt = '' ) {
		$api_key = env( 'CHAT_GPT_API_KEY' );

		$chat_prompt_preparation = __( 'You are a virtual assistant who helps with tips on using the WordPress CMS.', WL_THEME_ADMIN_DOMAIN );

		$url = 'https://api.openai.com/v1/completions';

		$params = array(
			'model'             => 'text-davinci-003',
			'prompt'            => $chat_prompt_preparation . '\n' . $prompt . '\n',
			'temperature'       => 0,
			'max_tokens'        => 1000,
			'top_p'             => 1,
			'frequency_penalty' => 0.0,
			'presence_penalty'  => 0.6,
		);

		$headers = array(
			'Content-Type'  => 'application/json',
			'Authorization' => 'Bearer ' . $api_key,
		);

		$response = wp_remote_post( $url,
			array(
				'timeout'   => 60,
				'sslverify' => false,
				'headers'   => $headers,
				'body'      => json_encode( $params ),
			)
		);

		$data = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( isset( $data['error'] ) ) {
			return $data['error']['message'];
		}

		if ( is_wp_error( $response ) ) {
			return false;
		}

		if ( 200 != wp_remote_retrieve_response_code( $response ) ) {
			return false;
		}

		return $data['choices'][0]['text'];
	}
}

/**
 * ChatGPT ajax function
 */
if ( ! function_exists( 'wl_chat_gpt_ajax_function' ) ) {
	function wl_chat_gpt_ajax_function() {
		$data['chat_gpt_data'] = trim( strip_tags( $_POST['chat_gpt_data'] ) );

		if ( empty( $data['chat_gpt_data'] ) ) {
			$errors['chat_gpt_data'] = 'Empty chat_gpt_data!';
		}

		if ( empty( $errors ) ) {
			$result['result'] = wl_chat_gpt_get_data_function( $data['chat_gpt_data'] );
			wp_send_json_success( $result );
		} else {
			$errors['message'] = __( 'Sorry, we are having a problem executing your request, please try again.',
				WL_THEME_ADMIN_DOMAIN );
			wp_send_json_error( $errors );
		}
	}

	add_action( 'wp_ajax_chat_gpt_ajax', 'wl_chat_gpt_ajax_function' );
	add_action( 'wp_ajax_nopriv_chat_gpt_ajax', 'wl_chat_gpt_ajax_function' );
}
