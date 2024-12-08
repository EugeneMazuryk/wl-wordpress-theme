<?php
/**
 * Theme WooCommerce functions and definitions
 *
 * @link https://woocommerce.com/
 */

/** ------------------------------------------------------------------------------------------------------------------ *
 * Do not edit anything in this file unless you know what you're doing
 * ----------------------------------------------------------------------------------------------------------------- **/

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * WooCommerce theme setup.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 */
if ( ! function_exists( 'wl_wc_setup_function' ) ) {
	function wl_wc_setup_function() {
		add_theme_support(
			'woocommerce',
			array(
				'thumbnail_image_width'         => 200,
				'gallery_thumbnail_image_width' => 200,
				'single_image_width'            => 499,
				'product_grid'                  => array(
					'default_rows'    => 4,
					'min_rows'        => 1,
					'default_columns' => 3,
					'min_columns'     => 1,
					'max_columns'     => 3,
				),
			)
		);
	}

	add_action( 'after_setup_theme', 'wl_wc_setup_function' );
}

/**
 * Disable the default WooCommerce stylesheet.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Related Products Args.
 */
if ( ! function_exists( 'wl_wc_related_products_args_function' ) ) {
	function wl_wc_related_products_args_function( $args ) {
		$defaults = array(
			'posts_per_page' => 3,
			'columns'        => 3,
		);

		$args = wp_parse_args( $defaults, $args );

		return $args;
	}

	//add_filter( 'woocommerce_output_related_products_args', 'wl_wc_related_products_args_function' );
}

/**
 * Get attachment woocommerce product thumbnail helper
 */
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	function get_wc_product_thumbnail( $class = null, $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0 ) {
		global $post, $woocommerce;

		$placeholder_width = ! $placeholder_width ?
			wc_get_image_size( 'shop_catalog_image_width' )['width'] :
			$placeholder_width;

		$placeholder_height = ! $placeholder_height ?
			wc_get_image_size( 'shop_catalog_image_height' )['height'] :
			$placeholder_height;

		$output = '';

		$output .= has_post_thumbnail() ?
			get_attachment_image( get_post_thumbnail_id( $post->ID ), array( 'class' => $class ) ) :
			'<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';

		return $output;
	}
}

/**
 * Get products attributes list
 */
if ( ! function_exists( 'get_product_attributes_list' ) ) {
	function get_wc_product_attributes_list( $slug = 'size' ) {
		global $product;

		$attributes = null;

		if ( ! empty( $product->get_attribute( 'pa_' . $slug ) ) && $product->is_type( 'variable' ) ) {

			$attributes = $product->get_available_variations( 'objects' );

			ob_start();

			?>
            <ul class="product_card__sizes">
				<?php foreach ( $attributes as $attr ) {
					$not_in_stock = null;

					if ( $attr->stock_status == 'outofstock' ) {
						$not_in_stock = ' not-in-stock';
					} ?>

                    <li class="product_card__size<?php echo $not_in_stock; ?>">
						<?php echo wc_strtoupper( $attr->attributes[ 'pa_' . $slug ] ); ?>
                    </li>

				<?php } ?>
            </ul>
			<?php

			$attributes = ob_get_clean();
		}

		return $attributes;
	}
}

/**
 * Get child categories by parent category
 */
if ( ! function_exists( 'get_child_categories' ) ) {
	function get_wc_child_categories( $term ) {
		if ( is_object( $term ) ) {
			$term = $term->term_id;
		}

		$main_category = get_term_by( 'id', $term, 'product_cat' );
		$cat_id        = $main_category->term_id;

		return get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'parent'     => $cat_id,
				'hide_empty' => false,
			)
		);
	}
}

/**
 * Change a currency symbol
 */
if ( ! function_exists( 'wl_wc_change_existing_currency_symbol_function' ) ) {
	function wl_wc_change_existing_currency_symbol_function( $currency_symbol, $currency ) {
		switch ( $currency ) {
			case 'UAH':
				$currency_symbol = 'грн.';
				break;
		}

		return $currency_symbol;
	}

	//add_filter('woocommerce_currency_symbol', 'wl_wc_change_existing_currency_symbol_function', 10, 2);
}

/**
 * Discount percentage action
 */
if ( ! function_exists( 'wl_discount_percentage_function' ) ) {
	function wl_discount_percentage_function() {
		$product = wc_get_product();

		if ( $product->is_type( 'variable' ) ) {
			$variations = $product->get_available_variations();

			$regular_price = 0;
			$sale_price    = 0;

			foreach ( $variations as $variation ) {
				$regular_price += (float) $variation['display_regular_price'];
				$sale_price    += (float) $variation['display_price'];
			}

			if ( $regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price ) {
				$discount_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
				echo apply_filters( 'wl_discount_percentage_filter', '<span class="discount-percentage">' . sprintf( esc_html__( '- %d%% sale', THEME_DOMAIN ), $discount_percentage ) . '</span>', $product );
			}
		} elseif ( $product->is_type( 'simple' ) ) {
			$regular_price = (float) $product->get_regular_price();
			$sale_price    = (float) $product->get_sale_price();

			if ( $regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price ) {
				$discount_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
				echo apply_filters( 'wl_discount_percentage_filter', '<span class="discount-percentage">' . sprintf( esc_html__( '- %d%% sale', THEME_DOMAIN ), $discount_percentage ) . '</span>', $product );
			}
		}
	}

	add_action( 'wl_discount_percentage', 'wl_discount_percentage_function' );
}
