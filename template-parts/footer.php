<?php
/**
 * Template part for displaying footer
 */

/**
 * ACF Fields
 */

wp_get_attachment_image('', '')
?>
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org', THEME_DOMAIN)); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', THEME_DOMAIN), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', THEME_DOMAIN), THEME_DOMAIN, '<a href="https://weblorem.com">Eugene Mazuryk</a>');
		?>
	</div>
</footer>
