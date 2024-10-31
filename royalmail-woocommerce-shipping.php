<?php
/*
	Plugin Name: PH Royal Mail WooCommerce Shipping
	Plugin URI: http://pluginhive.com/product/woocommerce-royal-mail-shipping-with-tracking/
	Description: Display RoyalMail shipping rates.
	Version: 1.0.4
	Author: PluginHive
	Author URI: https://www.pluginhive.com/
	WC requires at least: 2.6
	WC tested up to: 3.2
*/

if (!defined('PHive_Royal_Mail_ID')){
	define("PHive_Royal_Mail_ID", "phive_royalmail_shipping");
}

/**
 * Plugin activation check
 */
function phive_royalmail_pre_activation_check(){
	
	//check if basic version is there
	if ( is_plugin_active('royalmail-woocommerce-shipping-premium/royalmail-woocommerce-shipping-premium.php') ){
		deactivate_plugins( basename( __FILE__ ) );
		wp_die(__("Is everything fine? You already have the Premium version installed in your website. For any issues, kindly raise a ticket via <a target='_blank' href='//pluginhive.com/support/'>pluginhive.com/support</a>","ph-shipping-royalmail"), "", array('back_link' => 1 ));
	}
	
}
register_activation_hook( __FILE__, 'phive_royalmail_pre_activation_check' );

/**
 * Check if WooCommerce is active
 */
if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {	
	class phive_royalmail_wooCommerce_shipping_setup_basic {
		
		public function __construct() {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
			add_action( 'woocommerce_shipping_init', array( $this, 'phive_royalmail_wooCommerce_shipping_init' ) );
			add_filter( 'woocommerce_shipping_methods', array( $this, 'phive_royalmail_wooCommerce_shipping_methods' ) );		
			add_filter( 'admin_enqueue_scripts', array( $this, 'phive_royalmail_scripts' ) );		
				
		}
		
		public function phive_royalmail_scripts() {
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'ph-common-script', plugins_url( '/resources/js/phive_common.js', __FILE__ ), array( 'jquery' ) );
			wp_enqueue_style( 'ph-common-style', plugins_url( '/resources/css/phive_common_style.css', __FILE__ ));
		}
		
		public function plugin_action_links( $links ) {
			$plugin_links = array(
				'<a href="' . admin_url( 'admin.php?page=' . $this->phive_get_royalmail_settings_url() . '&tab=shipping&section=phive_royalmail_shipping' ) . '">' . __( 'Settings', 'ph-shipping-royalmail' ) . '</a>',
				'<a href="http://pluginhive.com/support/" target="_blank">' . __('Support', 'ph-shipping-royalmail') . '</a>',
			);
			return array_merge( $plugin_links, $links );
		}			
		
		public function phive_royalmail_wooCommerce_shipping_init() {
			include_once( 'includes/ph-legacy-handler.php' );
			include_once( 'includes/class-ph-royalmail-woocommerce-shipping.php' );
		}

		
		public function phive_royalmail_wooCommerce_shipping_methods( $methods ) {
			$methods[] = 'phive_royalmail_woocommerce_shipping_method';
			return $methods;
		}

		private function phive_get_royalmail_settings_url(){
			return version_compare(WC()->version, '2.1', '>=') ? "wc-settings" : "woocommerce_settings";
		}		
	}
	new phive_royalmail_wooCommerce_shipping_setup_basic();
}
