<?php
/**
 * Plugin Name:       Images Menu
 * Description:       Given a menu will output an image and caption for each menu item
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            ugy
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       image-menu
 *
 * @package           image-menu-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

function image_menu_block_init() {
	function image_menu_render_callback( $attributes, $content ){
		$menu_slug = $attributes['menuSlug'];
		$items = wp_get_nav_menu_items($menu_slug, []);
		$html = "<div class='block-image-menu'>";
		foreach ($items as $item) {
			ob_start();
			include('image-menu-item.php');
			$html .= ob_get_clean();
		}
		$html .= "</div>";
		return $html;
	}

	register_block_type(
			__DIR__ . '/build',
		[
			'attributes' => [
				'menuSlug' => [
					'type' => 'string'
				],
			],
			'render_callback' => 'image_menu_render_callback'
		]
	);
}
add_action( 'init', 'image_menu_block_init' );
