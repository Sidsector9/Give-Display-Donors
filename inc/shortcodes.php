<?php
/**
 * The GIVE Display Donors Shortcodes
 *
 * @copyright   Copyright (c) 2015, WordImpress
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function givedd_display_nonanonymous_donors( $atts, $content ) {
	$atts = shortcode_atts( array(
		'forms'     => array(),
		'anonymous' => 'false',
		'layout'    => 'grid',
	), $atts );

	$form_ids  = ( ! empty( $atts['forms'] ) ) ? explode( ',', $atts['forms'] ) : array();
	$payments_meta = givedd_get_nonanonymous_donors( $form_ids );
	$anonymous_name = false;

	switch ( $atts['layout'] ) {
		case 'grid':
			wp_enqueue_style( 'donor-grid-card' );
			break;

		case 'thumbnail':
			wp_enqueue_style( 'donor-grid-thumbnail' );
			break;
		
		default:
			break;
	}

	printf( '<div class="give-grid-donor-wrap layout-%s">', esc_attr( $atts['layout'] ) );

	foreach ( $payments_meta as $payment_meta ) {

		if ( 'false' === $atts['anonymous'] && ! empty( $payment_meta['anonymous'] ) ) {
			continue;
		}

		if ( 'true' === $atts['anonymous'] && ! empty( $payment_meta['anonymous'] ) ) {
			$anonymous_name = true;
		} else {
			$anonymous_name = false;
		}

		$donor            = new Give_Donor( $payment_meta['donor-id'] );
		$payment          = new Give_Payment( $payment_meta['payment-id'] );
		$name             = $donor->get_first_name() . ' ' . $donor->get_last_name()[0];
		$name             = ( ! $anonymous_name ) ? $name : __( 'Anonymous', 'givedd' );
		$email            = $donor->email;
		$payment_date     = human_time_diff( strtotime( $payment->get_meta( '_give_completed_date' ) ) );
		$payment_currency = $payment->get_meta( '_give_payment_currency' );
		$payment_total    = $payment->get_meta( '_give_payment_total' );

		switch ( $atts['layout'] ) {
			case 'grid':
				include GIVEDD_DIR . '/templates/donor-grid-card.php';
				break;

			case 'thumbnail':
				include GIVEDD_DIR . '/templates/donor-grid-thumbnail.php';
				break;
			
			default:
				break;
		}
	}

	printf( '</div>' );
}

add_shortcode( 'display_donors', 'givedd_display_nonanonymous_donors' );
