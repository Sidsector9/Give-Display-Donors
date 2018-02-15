<?php
/**
 * Plugin Name:     Give - Display Donors
 * Plugin URI:      https://givewp.com
 * Description:     Display recent donors on your site. Donors can opt-out of being displayed.
 * Version:         1.0
 * Author:          WordImpress, LLC
 * Author URI:      https://wordimpress.com
 * License:         GNU General Public License v2 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     givedd
 */

// Defines Plugin directory for easy reference
if ( ! defined( 'GIVEDD_DIR' ) ) {
	define( 'GIVEDD_DIR', dirname( __FILE__ ) );
}

// Defines Plugin directory for easy reference
if ( ! defined( 'GIVEDD_URL' ) ) {
	define( 'GIVEDD_URL', plugins_url( '/', __FILE__ ) );
}

if ( ! defined( 'GIVEDD_BASENAME' ) ) {
	define( 'GIVEDD_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'GIVEDD_VERSION' ) ) {
	define( 'GIVEDD_VERSION', '1.0' );
}

if ( ! defined( 'GIVEDD_MIN_GIVE_VER' ) ) {
	define( 'GIVEDD_MIN_GIVE_VER', '1.7' );
}

require GIVEDD_DIR . '/inc/private-donations.php';
require GIVEDD_DIR . '/admin/givedd-activation.php';
require GIVEDD_DIR . '/inc/givedd-metabox.php';
require GIVEDD_DIR . '/inc/shortcodes.php';

function require_after_give_loads() {
	if ( is_admin() ) {
		require GIVEDD_DIR . '/admin/shortcode-generator.php';
	}
}

add_action( 'give_loaded', 'require_after_give_loads', 100 );

wp_register_style( 'donor-grid-card', GIVEDD_URL . 'assets/css/donor-grid-card.css', array(), null, false );
wp_register_style( 'donor-grid-thumbnail', GIVEDD_URL . 'assets/css/donor-grid-thumbnail.css', array(), null, false );

if ( ! class_exists( 'Give' ) ) {
	return false;
}
