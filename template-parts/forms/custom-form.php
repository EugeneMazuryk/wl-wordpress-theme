<?php
/**
 * Template part for displaying code block
 */

use function Env\env;

/**
 * Arguments
 */
$form_id    = $args['form_id'] ?? null;
$form_title = $args['form_title'] ?? null;

?>
<!--<script src="https://www.google.com/recaptcha/api.js?render=--><?php //esc_html_e( env( 'GOOGLE_RECAPTCHA_SITE_KEY' ) ); ?><!--"></script>-->
<form id="wl-custom-form" method="POST">
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'wl_form_nonce' ); ?>">
	<?php if ( $form_id ) { ?>
        <input name="form_id" type="hidden" value="<?php esc_html_e( $form_id ); ?>">
	<?php } ?>
	<?php if ( $form_title ) { ?>
        <input name="title" type="hidden" value="<?php esc_html_e( $form_title ); ?>">
	<?php } ?>
	<?php foreach ( wl_get_utm_tags() as $utm_tag_key => $utm_tag ) { ?>
        <input name="<?php esc_html_e( $utm_tag_key ); ?>" type="hidden" value="<?php esc_html_e( $utm_tag ); ?>">
	<?php } ?>
<!--    <input type="hidden" id="g-recaptcha" name="g-recaptcha" data-sitekey="--><?php //esc_html_e( env( 'GOOGLE_RECAPTCHA_SITE_KEY' ) ); ?><!--">-->
    <input type="text" name="user-name" placeholder="<?php esc_html_e( 'Name', THEME_DOMAIN ); ?>">
    <input type="text" name="phone">
    <div class="form-error" style="color:#ee4949"></div>
    <input type="submit" value="<?php esc_html_e( 'Send', THEME_DOMAIN ); ?>">
</form>
