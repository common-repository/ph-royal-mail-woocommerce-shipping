<?php
class phive_royalmail_rate_calculator {
	private $package;
	private $special_services;
	private $boxes;
	public function __construct() {
		$this->settings 			= get_option( 'woocommerce_'.PHive_Royal_Mail_ID.'_settings', null );
		$this->debug 				= ( $bool = $this->settings[ 'debug' ] ) && $bool == 'yes' ? true : false;
		
		$this->set_boxes();
	}
	public function set_boxes(){
		$this->boxes = include('data-boxes.php');
	}
	public function set_packages($packages){
		$this->packages = $packages;
	}

	public function calculate_rate( $packages=array(), $special_services=array() ){

		$dimension_unit = get_option('woocommerce_dimension_unit');
		$weight_unit = get_option('woocommerce_weight_unit');
		if( $dimension_unit != "cm" || $weight_unit != 'kg' ){
			$this->debug('Royal mail requires weight unit in KG and dimension unit in CM.');
			return;
		}

		$wc_currency = get_woocommerce_currency();
		if($wc_currency != "GBP" ){
			$this->debug('Royal mail required currency GBP, Pleae change the Woocommerce currecy under settings->general');
			return;
		}



		$rules = array();
		$rates = array();
		if(	!empty($packages)	)
			$this->packages = $packages;
		
		$this->special_services = $special_services;

		if( empty($this->packages) || count($this->packages) == 0  ){
			$this->debug("No package found, Please double check the packing methods");
			return;
		}

		foreach ($this->packages as $key => $package) {
			$zones = $this->find_zones( $package['destination']['country'] );
			$this->debug( "Royal mail satisfied zones for package '$key': <pre>".print_r($zones,1)."</pre>" );
			
			$rules = $this->find_rules(
				array(
					'zone' => $zones,
					'weight' => $package['weight']['value'],
					'box'	=> isset($package['package_id']) ? $package['package_id'] : '',
				)
			);
			$this->debug("Royal mail Rules for package '$key': <pre>".print_r($rules,1)."</pre>");
			$rates = array_merge( $rates, $this->find_rates( $rules, $package['cost']['amount'] ) );
		}

		// in_array( get_woocommerce_currency(), array( 'USD' ) );
		return $rates;
	}

	private function find_rates($rule, $package_coast){
		$all_rates = include('data-rates.php');
		$find_rates = array();
		foreach ($all_rates as $rate) {
			$fount = array_intersect_key( $rate['rules'], array_flip($rule) );
			if( count($fount) ){
				
				$surcharges = 0;
				if( in_array('insurance', $this->special_services) ){
					$surcharges += $this->get_insured_rate( $rate, $package_coast );
					$this->debug( 'Adding isurance charge ' );
				}
				if( !empty($this->special_services['signature']) ){
					$surcharges += $this->get_signature_rate( $rate );
					$this->debug( 'Adding Signature charge ' );
				}
				$find_rates[] = array(
					'code' => $rate['id'],
					'id' => $rate['id'],
					'name' => $rate['name'],
					'cost' => floatval( min($fount) ) + $surcharges,
				);
			}
		}
		$this->debug( 'Royal mail Rate found <pre>'.print_r($find_rates,1).'</pre>' );
		return $find_rates;
	}

	private function get_signature_rate($rate){
		if( !empty( $rate['special_services']['signature_cost'] ) ){
			return $rate['special_services']['signature_cost'];
		}else{
			return 0;
		}
	}

	private function get_insured_rate($rate, $package_cost){
		if( !empty( $rate['special_services']['insured_cost'] ) ){
			$rules = include('data-rate-rules.php');
			foreach( $rate['special_services']['insured_cost'] as $rule => $cost ){
				if( $this->phive_is_eligible_rule( $rules[$rule], array('price'=>$package_cost ) ) ){
					return $cost;
				}
			}
		}
		return 0;
	}

	private function find_zones($country){
		$zones = array();
		$this->zones = include('data-zones.php');
		
		if ( $country == 'GB' ) {
			return 'uk';
		}elseif ( in_array( $country, $this->zones['eur']) ) {
			return 'eur';
		}elseif ( in_array( $country, $this->zones['eu'] ) ) {
			return 'eu';
		}elseif ( in_array( $country, $this->zones['w2'] ) ) {
			return 'w2';
		}else{
			return 'w1';
		}
	}

	private function find_rules( $input_values ){
		$rules = include('data-rate-rules.php');
		$eligible_rules = array();
		foreach ($rules as $rule_name => $rule) {
			if( $this->phive_is_eligible_rule( $rule, $input_values ) ){
				$eligible_rules[] = $rule_name;
			}
		}
		return $eligible_rules;
	}

	private function phive_is_eligible_rule( $rule, $input_values ){		
		foreach ($rule as $filter_name => $rule_value ) {
			if( false == $this->phive_compare_rule_field( $filter_name, $rule_value, $input_values ) ){
				return false;
			}
		}
		return true;
	}

	private function phive_compare_rule_field( $filter_name, $rule_value, $input_values ) {
		if(empty($filter_name)){
			return true;
		}
		//Case of zone
		if( is_array($rule_value ) ){
			return in_array( $input_values[$filter_name], $rule_value );
		}

		// if string
		if( !is_numeric($rule_value) ){
			
			//if the rule filed is not defined.
			if( !isset( $input_values[$filter_name] ) ){
				return false;
			}else{
				return $rule_value == $input_values[$filter_name];
			}
		}

		$input_key = str_replace( 'min_', '', str_replace('max_', '', $filter_name) ) ;
		if( empty($input_values[$input_key]) ){
			return false;
		}

		if( strpos($filter_name, 'max') !== false  ){
			return $input_values[$input_key] <= $rule_value;
		}elseif( strpos($filter_name, 'min') !== false  ){
			return $input_values[$input_key] > $rule_value;
		}else{
			return $input_values[$input_key] == $rule_value;
		}
	}

	public function debug( $message, $type = 'notice' ) {
		if ( $this->debug ) {
			wc_add_notice( $message, $type );
		}
	}
}
