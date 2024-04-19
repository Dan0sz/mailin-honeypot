<?php
/**
 * Plugin Name: Honeypot for Brevo
 * Description: Adds logic which parses a honeypot field, called `come_and_get_it` in the Brevo plugin's signup form widgets.
 * Version: 1.0.1
 * Author: Daan from Daan.dev
 * Author URI: https://daan.dev
 * Plugin URI: https://github.com/Dan0sz/ffwp
 */

class BrevoHoneypot {
	/**
	 * @var string $honeypot_name
	 */
	private $honeypot_name;

	/**
	 *
	 */
	public function __construct() {
		$this->honeypot_name = apply_filters( 'brevo_honeypot_name', 'come_and_get_it' );

		/**
		 * Run before 'mailin', which runs at default priority (10).
		 */
		add_action( 'init', [ $this, 'init' ], 9 );
	}

	/**
	 * @return void
	 */
	public function init() {
		if ( ! empty( $_POST[ $this->honeypot_name ] ) ) {
			$_POST[ 'sib_action' ]      = 'bot';
			$_POST[ 'sib_form_action' ] = 'bot';
		}
	}
}

new BrevoHoneypot();