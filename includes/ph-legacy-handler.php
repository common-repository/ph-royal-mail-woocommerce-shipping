<?php
if (!function_exists('WC')){
	function WC(){
		return $GLOBALS['woocommerce'];
	}
}

class phive_product{
	public $id;
	public $length;
	public $width;
	public $height;
	public $weight;
	public $variation_id;
	public $obj;
	public function __construct( $item ){
		$this->wc_version 	= WC()->version;
		$this->obj 			= wc_get_product( $item );
		$this->set_item_properties();
	}

	public function __call( $method_name, $args ){
		return $this->obj->$method_name();
	}

	private function set_item_properties(){
		$this->id 			= ( $this->wc_version < '2.7.0' ) ? $this->obj->id : $this->obj->get_id();
		$this->length 		= ( $this->wc_version < '2.7.0' ) ? $this->obj->length : $this->obj->get_length();
		$this->width 		= ( $this->wc_version < '2.7.0' ) ? $this->obj->width : $this->obj->get_width();
		$this->height 		= ( $this->wc_version < '2.7.0' ) ? $this->obj->height : $this->obj->get_height();
		$this->weight 		= ( $this->wc_version < '2.7.0' ) ? $this->obj->weight : $this->obj->get_weight();
		$this->variation_id = ( $this->wc_version < '2.7.0' ) ? $this->obj->variation_id : $this->obj->get_id(); //get_id will always be the variation ID if this is a variation
	}

	public function get_weight(){
		return $this->weight;
	}
	public function get_id(){
		return $this->id;
	}
	public function get_length(){
		return $this->length;
	}
	public function get_width(){
		return $this->width;
	}
	public function get_height(){
		return $this->height;
	}
}
