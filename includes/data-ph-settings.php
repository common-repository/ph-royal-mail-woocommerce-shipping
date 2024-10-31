<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $woocommerce;


/**
 * Array of settings
 */
return array(
	'enabled'		  => array(
		'title'		   	=> __( 'Enable Rates', 'ph-shipping-royalmail' ),
		'type'			=> 'checkbox',
		'label'			=> __( 'Enable', 'ph-shipping-royalmail' ),
		'default'		=> 'no',
		'class'			=>'royalmail_rates_tab'
	),
	'title'			=> array(
		'title'		   => __( 'Method Title', 'ph-shipping-royalmail' ),
		'type'			=> 'text',
		'description'	 => __( 'This controls the title which the user sees during checkout.', 'ph-shipping-royalmail' ),
		'default'		 => __( 'Royal Mail', 'ph-shipping-royalmail' ),
		'desc_tip'		=> true,
		'class'			=>'royalmail_rates_tab'
	),

	'debug'	  => array(
		'title'		   => __( 'Debug Mode', 'ph-shipping-royalmail' ),
		'label'		   => __( 'Enable', 'ph-shipping-royalmail' ),
		'type'			=> 'checkbox',
		'default'		 => 'no',
		'desc_tip'	=> true,
		'description'	 => __( 'Enable debug mode to show debugging information on the cart/checkout.', 'ph-shipping-royalmail' ),
		'class'			=>'royalmail_general_tab',
	),

	'offer_rates'   => array(
		'title'		   => __( 'Offer Rates', 'ph-shipping-royalmail' ),
		'type'			=> 'select',
		'description'	 => '',
		'default'		 => 'all',
		'class'		   => 'wc-enhanced-select royalmail_rates_tab',
		'options'		 => array(
			'all'		 => __( 'Offer the customer all returned rates', 'ph-shipping-royalmail' ),
			'cheapest'	=> __( 'Offer the customer the cheapest rate only, anonymously', 'ph-shipping-royalmail' ),
		),
	),

	'services'  => array(
		'type'			=> 'services'
	),

	'title_other'		   => array(
		'title'		   	=> __( '', 'ph-shipping-royalmail' ),
		'type'			=> 'title',
		'class'			=> '',
		// 'description'	 => __( '', 'ph-shipping-royalmail' ),
	),

	'conversion_rate'	 => array(
		'title' 		  => __('Conversion Rate', 'ph-shipping-royalmail'),
		'type' 			  => 'text',
		'default'		 => '',
		'class'			=>'royalmail_rates_tab',
		'description' 	  => __('Enter the conversion amount in case you have a different currency set up comparing to the currency of origin location. This amount will be multiplied with the shipping rates. Leave it empty if no conversion required.','ph-shipping-royalmail'),
		'desc_tip' 		  => true
	),
	
	'exclude_tax'	  => array(
		'title'		   => __( 'Exclude Tax', 'ph-shipping-royalmail' ),
		'description'	 => __( 'Taxes will be excluded from product prices while generating label', 'ph-shipping-royalmail' ),
		'desc_tip'		   => true,
		'type'			=> 'checkbox',
		'class'			=>'royalmail_general_tab',
		'default'		 => 'no'
	),
	'options' => array(
			'title' => __( 'Additional Options', 'woothemes' ),
			'type' 	=> 'multiselect',
			'class' => 'chosen_select',
			'css' 	=> 'width: 450px;',
			'default' => '',
			'options' => array(
				'insurance'	=> __( 'Insurance', 'ph-shipping-canada-post' ),
			),
			'description'	 => __( 'Additional options affect all rates.', 'ph-shipping-canada-post' ),
			'desc_tip'		=> true
	),
);