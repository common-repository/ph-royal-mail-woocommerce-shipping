<?php
return array(
	'domestic' => array(
		array( 
			'name' 			=> 'Royal mail letter',
			'id' 			=> 'letter',
			'max_weight' 	=> 0.1,
			'box_weight' => 0,
			'length'=>0.5,
			'width'=>16.5,
			'height'=>24
		),
		array( 
			'name' => 'Royal mail large letter',
			'id' => 'large-letter',
			'max_weight' => 0.75,
			'length' => 2.5,
			'width'=>25,
			'height'=> 35
		),
		array( 
			'name' => 'Royal mail small parcel',
			'id' => 'small-parcel',
			'max_weight' =>2,
			'length'=>45,
			'width'=>35,
			'height'=>16,
		),
		array( 
			'name' => 'Royal mail medium parcel',
			'id' => 'medium-parcel',
			'max_weight'=>20,
			'length'=>61,
			'width'=>46,
			'height'=>46
		),
	),
	'international' => array(
		array(
			'name' => 'Royal mail parcel (International)',
			'id' => 'parcel',
			'length'=>45,
			'width'=>25.5,
			'height'=>25.5,
			'max_weight' =>2,
		),
		/*array( 
			'name' =>'tube (International)',
			'id' => 'tube',
			'max_weight' =>2
		),*/
	),
);