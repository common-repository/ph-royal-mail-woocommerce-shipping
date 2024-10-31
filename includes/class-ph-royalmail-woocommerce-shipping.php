<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class phive_royalmail_woocommerce_shipping_method extends WC_Shipping_Method {
	private $default_boxes;
	private $found_rates;
	private $services;

	public function __construct() {
		$this->id					= PHive_Royal_Mail_ID;

		$this->method_title			= __( 'Royal Mail', 'ph-shipping-royalmail' );
		$this->method_description 	= __( 'Obtains Royal Mail Rates', 'ph-shipping-royalmail' );
		$this->init();
		$this->services				= include( 'royalmail/data-rates.php' );
	}

	private function init() {
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		$this->enabled				= isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : $this->enabled;
		$this->debug				= ( $bool = $this->get_option( 'debug' ) ) && $bool == 'yes' ? true : false;
		
		$this->title				= $this->get_option( 'title', $this->method_title );
		$this->countries			= isset( $this->settings['countries'] ) ? $this->settings['countries'] : array();
		
		$this->conversion_rate		= ! empty( $this->settings['conversion_rate'] ) ? $this->settings['conversion_rate'] : '';
		$this->custom_services		= $this->get_option( 'services', array( ));
		$this->offer_rates			= $this->get_option( 'offer_rates', 'all' );
		
		
		$this->dimension_unit			= 'cm';
		$this->weight_unit				= 'kg';
		$this->labelapi_dimension_unit	= 'CM';
		$this->labelapi_weight_unit 	= 'KG';
		
		$default_boxes = include('royalmail/data-boxes.php');
		$this->default_boxes 		= array_merge($default_boxes['domestic'], $default_boxes['international']);

		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
	}



	public function admin_options() {
		include('market.php');
		// Show settings
		parent::admin_options();
	}

	/**
	 * is_available function.
	 *
	 * @param array $package
	 * @return bool
	 */
	public function is_available( $package ) {
		if ( "no" === $this->enabled ) {
			return false;
		}
		return apply_filters( 'woocommerce_shipping_' . $this->id . '_is_available', true, $package );
	}

	public function init_form_fields() {
		$this->form_fields  = include( 'data-ph-settings.php' );
	}

	public function generate_services_html() {
		ob_start();
		include( 'html-ph-services.php' );
		return ob_get_clean();
	}
	
	public function validate_services_field( $key ) {
		$services		 = array();
		$posted_services  = isset($_POST['royalmail_service']) ? $_POST['royalmail_service'] : array();

		foreach ( $posted_services as $code => $settings ) {
			$services[ $code ] = array(
				'order'			  => wc_clean( $settings['order'] ),
				'enabled'			=> isset( $settings['enabled'] ) ? true : false,
			);
		}

		return $services;
	}

	public function phive_get_packages( $package ) {
		return $this->per_item_shipping( $package );
	}

	private function per_item_shipping( $package ) {
		$to_ship  = array();
		$group_id = 1;

		// Get weight of order
		foreach ( $package['contents'] as $item_id => $values ) {
			$values['data'] = $this->phive_load_product( $values['data'] );
			if ( ! $values['data']->needs_shipping() ) {
				$this->debug( sprintf( __( 'Product # is virtual. Skipping.', 'ph-shipping-royalmail' ), $item_id ), 'error' );
				continue;
			}
			
			$skip_product = apply_filters('phive_shipping_skip_product',false, $values, $package['contents']);
			if($skip_product){
				continue;
			}

			if ( ! $values['data']->get_weight() ) {
				$this->debug( sprintf( __( 'Product # is missing weight. Aborting.', 'ph-shipping-royalmail' ), $item_id ), 'error' );
				return;
			}

			$group = array();

			$group = array(
				'weight'		=> array(
					'value' => $this->round_up( wc_get_weight( $values['data']->get_weight(), $this->weight_unit ), 2 ),
					'units' => $this->labelapi_weight_unit,
				),
				'cost' => array(
					'amount'   => round( $values['data']->get_price() ),
					'currency' => get_woocommerce_currency()
				),
				'packed_products' => array( $values['data'] )
			);

			$custom_field_index=1;

			$custom_field = '';
			while( $custom_field_index==1 || !empty( $custom_field ) ){
				$length = $width = $height = $weight =0;
				if($values['data']->get_type()=='simple'){
					$length = $custom_field_index == 1 ? $values['data']->get_length() : get_post_meta( $values['data']->id, '_length'.$custom_field_index, true );
					$height = $custom_field_index == 1 ? $values['data']->get_height() : get_post_meta( $values['data']->id, '_height'.$custom_field_index, true );
					$width 	= $custom_field_index == 1 ? $values['data']->get_width()  : get_post_meta( $values['data']->id, '_width' .$custom_field_index, true );
					$weight = $custom_field_index == 1 ? $values['data']->get_weight() : get_post_meta( $values['data']->id, '_weight'.$custom_field_index, true );
				}

				$dimensions = array( 
					!empty($length) ? $length : $values['data']->get_length(),
					!empty($width)  ? $width  : $values['data']->get_width(),
					!empty($height) ? $height : $values['data']->get_height()
				);

				if ( $dimensions[0] && $dimensions[1] && $dimensions[2] ) {
					sort( $dimensions );
	
					$group['dimensions'] = array(
						'length' => round( wc_get_dimension( $dimensions[2], $this->dimension_unit ), 0 ),
						'width'  => round( wc_get_dimension( $dimensions[1], $this->dimension_unit ), 0 ),
						'height' => round( wc_get_dimension( $dimensions[0], $this->dimension_unit ), 0 ),
						'units'  => $this->labelapi_dimension_unit
					);
					$group['weight'] = array(
						'value' => $this->round_up( wc_get_weight( !empty($weight) ? $weight : $values['data']->get_weight(), $this->weight_unit ), 2 ),
						'units' => $this->labelapi_weight_unit
					);

					$group['package_id'] = $this->get_best_fittng_pachage( array( 'dimensions'=>$dimensions, 'weight'=>$group['weight']['value'] ) );
				}

				$custom_field_index++;
				$custom_field = get_post_meta( $values['data']->id, '_weight'.$custom_field_index, true );

				for ( $i=0; $i < $values['quantity'] ; $i++){
					$to_ship[] = $group;
				}

				$group_id++;
			}
		}
		return $to_ship;
	}

	private function get_best_fittng_pachage( $item ){
		foreach ($this->default_boxes as $box) {
			$dimensions = array( $box['length'],$box['width'],$box['height'] );
			$box_dim = array('dimensions'=>$dimensions, 'weight'=>$box['max_weight'] );
			if( $this->can_fit($item, $box_dim) ){
				return $box['id'];
			}
		}
		return false;
	}
	private function can_fit( $item, $box ){
		if( $item['weight'] > $box['weight'] ){
			return false;
		}

		sort($item['dimensions']); 
		sort($box['dimensions']);
		return ( $box['dimensions'][0] >= $item['dimensions'][0] && $box['dimensions'][1] >= $item['dimensions'][1] && $box['dimensions'][2] >= $item['dimensions'][2] && $this->get_volume($item) <= $this->get_volume($box) ) ? true : false;
	}
	private function get_volume( $dimensions ) {
		return floatval( max( 1, $dimensions['height'] ) * max( 1, $dimensions['width'] ) * max( 1, $dimensions['length'] ) );
	}

	private function round_up( $value, $precision=2 ) { 
		$pow = pow ( 10, $precision ); 
		return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow; 
	}
	
	public function calculate_shipping( $package = array() ) {
		// Clear rates
		$this->found_rates = array();

		// Debugging
		$this->debug( __( 'ROYAL MAIL debug mode is on - to hide these messages, turn debug mode off in the settings.', 'ph-shipping-royalmail' ) );
		
		$phive_packages	=	array();
		$packages = apply_filters('phive_filter_package_address', array($package) , 'origin_address');
		
		foreach($packages as $package){
			$package	= apply_filters( 'phive_customize_package_on_cart_and_checkout', $package );	// Customize the packages if cart contains bundled products
			$phive_packs	= $this->phive_get_packages( $package );
			if(is_array($phive_packs)){
				foreach ($phive_packs as $key => &$pack) {
					$pack['destination'] = $package['destination'];
				}
				
				$phive_packages	=	array_merge($phive_packages, $phive_packs);
			}
		}
		include_once('royalmail/royalmail-rate-calculator.php');

		$calculator = new phive_royalmail_rate_calculator();
		$special_service			= $this->get_option( 'options', array() );

		$rates = $calculator->calculate_rate($phive_packages, $special_service);

		if( empty($rates) ){
			return;
		}

		foreach ($rates as $rate) {
			if( isset( $this->custom_services[ $rate['id'] ]['enabled'] ) && $this->custom_services[ $rate['id'] ]['enabled'] != 1 ){
				continue;
			}
			$this->prepare_rate( $rate['code'], $rate['id'], $rate['name'], $rate['cost'] );
		}

		// Ensure rates were found for all packages
		$packages_to_quote_count = sizeof( $phive_packages );

		if ( $this->found_rates ) {
			foreach ( $this->found_rates as $key => $value ) {
				if ( $value['packages'] < $packages_to_quote_count ) {
					unset( $this->found_rates[ $key ] );
				}
			}
		}
		$this->add_found_rates();		
	}

	private function prepare_rate( $rate_code, $rate_id, $rate_name, $rate_cost, $rate_name_extra='' ) {

		// Name adjustment
		if ( ! empty( $this->custom_services[ $rate_code ]['name'] ) ) {
			$rate_name = $this->custom_services[ $rate_code ]['name'] . $rate_name_extra;
		}

		// Cost adjustment %
		if ( ! empty( $this->custom_services[ $rate_code ]['adjustment_percent'] ) ) {
			$rate_cost = $rate_cost + ( $rate_cost * ( floatval( $this->custom_services[ $rate_code ]['adjustment_percent'] ) / 100 ) );
		}
		// Cost adjustment
		if ( ! empty( $this->custom_services[ $rate_code ]['adjustment'] ) ) {
			$rate_cost = $rate_cost + floatval( $this->custom_services[ $rate_code ]['adjustment'] );
		}

		// Enabled check
		if ( isset( $this->custom_services[ $rate_code ] ) && empty( $this->custom_services[ $rate_code ]['enabled'] ) ) {
			return;
		}

		// Merging
		if ( isset( $this->found_rates[ $rate_id ] ) ) {
			$rate_cost = $rate_cost + $this->found_rates[ $rate_id ]['cost'];
			$packages  = 1 + $this->found_rates[ $rate_id ]['packages'];
		} else {
			$packages  = 1;
		}

		// Sort
		if ( isset( $this->custom_services[ $rate_code ]['order'] ) ) {
			$sort = $this->custom_services[ $rate_code ]['order'];
		} else {
			$sort = 999;
		}

		$this->found_rates[ $rate_id ] = array(
			'id'	   => $rate_id,
			'label'	=> $rate_name,
			'cost'	 => $rate_cost,
			'sort'	 => $sort,
			'packages' => $packages,
		);
	}

	public function add_found_rates() {
		if ( $this->found_rates ) {
			
			if( $this->conversion_rate ) {
				foreach ( $this->found_rates as $key => $rate ) {
					$this->found_rates[ $key ][ 'cost' ] = $rate[ 'cost' ] * $this->conversion_rate;
				}
			}

			if ( $this->offer_rates == 'all' ) {

				uasort( $this->found_rates, array( $this, 'sort_rates' ) );

				foreach ( $this->found_rates as $key => $rate ) {
					$this->add_rate( $rate );
				}
			} else {
				$cheapest_rate = '';

				foreach ( $this->found_rates as $key => $rate ) {
					if ( ! $cheapest_rate || $cheapest_rate['cost'] > $rate['cost'] ) {
						$cheapest_rate = $rate;
					}
				}

				$cheapest_rate['label'] = $this->title;

				$this->add_rate( $cheapest_rate );
			}
		}
	}

	public function sort_rates( $a, $b ) {
		if ( $a['sort'] == $b['sort'] ) return 0;
		return ( $a['sort'] < $b['sort'] ) ? -1 : 1;
	}

	private function phive_load_product( $product ){
		if( !$product ){
			return false;
		}
		if( !class_exists('phive_product') ){
			include_once('ph-legacy-handler.php');
		}
		if($product instanceof phive_product){
			return $product;
		}
		return new phive_product( $product );
	}

	public function debug( $message, $type = 'notice' ) {
		if ( $this->debug ) {
			wc_add_notice( $message, $type );
		}
	}
}
new phive_royalmail_woocommerce_shipping_method;
