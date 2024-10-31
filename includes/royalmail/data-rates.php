<?php
return array(
	
	array(
		'name' 	=> 'Royal Mail Special Delivery by 1pm&reg;',
		'id' 	=> 'special_delivery_guaranteed_by_1',
		'special_services' 	=> array(
			'insured_cost'  => array(
				'price_500-1000' 	=> 1,
				'price_1000-2500' 	=> 3,
			),
		),
		'rules' => array( 
			'uk_0-0.1kg' 	=> 6.50,
			'uk_0.1-0.5kg' 	=> 7.30,
			'uk_0.5-1kg' 	=> 8.60,
			'uk_1-2kg' 		=> 11.00,
			'uk_2-10kg' 	=> 26.60,
			'uk_10-20kg' 	=> 41.20,
		)
	),

	array(
		'name' 	=> 'Royal Mail Special Delivery by 1pm&reg; with Saturday',
		'id' 	=> 'special_delivery_guaranteed_by_1_with_saturday',
		'special_services' 	=> array(
			'insured_cost'  => array(
				'price_500-1000' 	=> 1.2,
				'price_1000-2500' 	=> 5.7,
			),
		),
		'rules' => array( 
			'uk_0-0.1kg' 	=> 10.80,
			'uk_0.1-0.5kg' 	=> 11.76,
			'uk_0.5-1kg' 	=> 13.32,
			'uk_1-2kg' 		=> 16.20,
			'uk_2-10kg' 	=> 34.92,
			'uk_10-20kg' 	=> 52.44,
		)
	),

	array(
		'name' => 'Royal Mail Special Delivery by 9am&reg;',
		'id' => 'special_delivery_guaranteed_by_9am',
		'special_services' => array(
			'insured_cost'  => array(
				'price_500-1000' 	=> 2.2,
				'price_1000-2500' 	=> 5.7,
			),
		),
		'rules' => array( 
			'uk_0-0.1kg' => 18.36,
			'uk_0.1-0.5kg' => 20.76,
			'uk_0.5-1kg' => 22.50,
			'uk_1-2kg' => 26.94,
		)
	),

	array(
		'name' => 'Royal Mail Special Delivery by 9am&reg; with Saturday',
		'id' => 'special_delivery_guaranteed_by_9_with_saturday',
		'special_services' => array(
			'insured_cost'  => array(
				'price_500-1000' 	=> 2.2,
				'price_1000-2500' 	=> 5.7,
			),
		),
		'rules' => array( 
			'uk_0-0.1kg' => 21.36,
			'uk_0.1-0.5kg' => 23.76,
			'uk_0.5-1kg' => 25.50,
			'uk_1-2kg' => 29.94,
		)
	),

	array(
		'name' => 'Royal Mail 1st Class',
		'id' => '1st_class',
		'special_services' => array(
			// 'signature_cost'  => 1.1
		),
		'rules' => array( 
			'uk_0-0.1kg_letter' => 0.67,
			'uk_0-0.1kg_largeletter' => 1.01,
			'uk_0.1-0.250kg_largeletter' => 1.4,
			'uk_0.250-0.500kg_largeletter' => 1.87,
			'uk_0.500-0.750kg_largeletter' => 2.60,

			'uk_0-1kg_smallparcel' => 3.45,
			'uk_1-2kg_smallparcel' => 5.50,

			'uk_0-1kg_mediumparcel' => 5.75,
			'uk_1-2kg_mediumparcel' => 8.95,
			'uk_2-5kg_mediumparcel' => 15.85,
			'uk_5-10kg_mediumparcel' => 21.90,
			'uk_10-20kg_mediumparcel' => 33.40,
		)
	),

	array(
		'name' => 'Royal Mail 1st Class Signed For',
		'id' => '1st_class_signedRoyal Mail 1st Class',
		'special_services' => array(
			// 'signature_cost'  => 1.1 
		),
		'rules' => array( 
			'uk_0-0.1kg_letter' => 1.77,
			'uk_0-0.1kg_largeletter' => 2.11,
			'uk_0.1-0.250kg_largeletter' => 2.50,
			'uk_0.250-0.500kg_largeletter' => 2.97,
			'uk_0.500-0.750kg_largeletter' => 3.70,

			'uk_0-1kg_smallparcel' => 4.45,
			'uk_1-2kg_smallparcel' => 6.50,

			'uk_0-1kg_mediumparcel' => 6.75,
			'uk_1-2kg_mediumparcel' => 9.95,
			'uk_2-5kg_mediumparcel' => 16.85,
			'uk_5-10kg_mediumparcel' => 22.90,
			'uk_10-20kg_mediumparcel' => 34.40,
		)
	),

	array(
		'name' => 'Royal Mail 2st Class',
		'id' => '2st_class',
		'special_services' => array(
			// 'signature_cost'  => 1.1
		),
		'rules' => array( 
			'uk_0-0.1kg_letter' 			=> 0.58,
			'uk_0-0.1kg_largeletter' 		=> 0.79,
			'uk_0.1-0.250kg_largeletter' 	=> 1.26,
			'uk_0.250-0.500kg_largeletter' 	=> 1.64,
			'uk_0.500-0.750kg_largeletter' 	=> 2.22,

			'uk_0-1kg_smallparcel' 			=> 2.95,
			'uk_1-2kg_smallparcel'			=> 2.95,

			'uk_0-1kg_mediumparcel' 		=> 5.05,
			'uk_1-2kg_mediumparcel' 		=> 5.05,
			'uk_2-5kg_mediumparcel' 		=> 13.75,
			'uk_5-10kg_mediumparcel' 		=> 20.25,
			'uk_10-20kg_mediumparcel' 		=> 28.55,
		)
	),

	array(
		'name' => 'Royal Mail 2st Class Signed For',
		'id' => '2st_class_signed',
		'special_services' => array(
			// 'signature_cost'  => 1.1
		),
		'rules' => array( 
			'uk_0-0.1kg_letter' => 1.68,
			'uk_0-0.1kg_largeletter' => 1.89,
			'uk_0.1-0.250kg_largeletter' => 2.36,
			'uk_0.250-0.500kg_largeletter' => 2.74,
			'uk_0.500-0.750kg_largeletter' => 3.32,

			'uk_0-1kg_smallparcel' => 3.95,
			'uk_1-2kg_smallparcel' => 3.95,

			'uk_0-1kg_mediumparcel' => 6.05,
			'uk_1-2kg_mediumparcel' => 6.05,
			'uk_2-5kg_mediumparcel' => 14.75,
			'uk_5-10kg_mediumparcel' => 21.25,
			'uk_10-20kg_mediumparcel' => 29.55,
		)
	),

	//Parcel force services
	array(
		'name' => 'Royal Mail Parcelforce express9',
		'id' => 'parcelforce_express9',
		'special_services' => array(
		),
		'rules' => array( 
			'uk_weight_0-2kg' 	=> 39.90,
			'uk_weight_2-5kg' 	=> 40.92,
			'uk_weight_5-10kg' 	=> 44.34,
			'uk_weight_10-15kg' => 51.18,
			'uk_weight_15-20kg' => 56.58,
			'uk_weight_20-25kg' => 67.80,
			'uk_weight_25-30kg' => 72.00,
		)
	),
	array(
		'name' => 'Royal Mail Parcelforce express10',
		'id' => 'parcelforce_express10',
		'special_services' => array(
		),
		'rules' => array( 
			'uk_weight_0-2kg' 	=> 29.82,
			'uk_weight_2-5kg' 	=> 30.84,
			'uk_weight_5-10kg' 	=> 34.26,
			'uk_weight_10-15kg' => 41.04,
			'uk_weight_15-20kg' => 46.44,
			'uk_weight_20-25kg' => 57.72,
			'uk_weight_25-30kg' => 61.92,
		)
	),
	array(
		'name' => 'Royal Mail Parcelforce expressAM',
		'id' => 'parcelforce_expressAM',
		'special_services' => array(
		),
		'rules' => array( 
			'uk_weight_0-2kg' 	=> 19.74,
			'uk_weight_2-5kg' 	=> 20.70,
			'uk_weight_5-10kg' 	=> 24.18,
			'uk_weight_10-15kg' => 30.96,
			'uk_weight_15-20kg' => 36.42,
			'uk_weight_20-25kg' => 47.64,
			'uk_weight_25-30kg' => 51.84,
		)
	),
	array(
		'name' => 'Royal Mail Parcelforce express24',
		'id' => 'parcelforce_express24',
		'special_services' => array(
		),
		'rules' => array( 
			'uk_weight_0-2kg' 	=> 16.68,
			'uk_weight_2-5kg' 	=> 17.70,
			'uk_weight_5-10kg' 	=> 21.12,
			'uk_weight_10-15kg' => 27.96,
			'uk_weight_15-20kg' => 33.36,
			'uk_weight_20-25kg' => 44.58,
			'uk_weight_25-30kg' => 48.78,
		)
	),
	array(
		'name' => 'Royal Mail Parcelforce express48',
		'id' => 'parcelforce_express48',
		'special_services' => array(
		),
		'rules' => array( 
			'uk_weight_0-2kg' 	=> 12.12,
			'uk_weight_2-5kg' 	=> 13.14,
			'uk_weight_5-10kg' 	=> 16.62,
			'uk_weight_10-15kg' => 23.40,
			'uk_weight_15-20kg' => 28.80,
			'uk_weight_20-25kg' => 40.08,
			'uk_weight_25-30kg' => 44.22,
		)
	),
	array(
		'name' => 'Royal Mail Parcelforce express48 large',
		'id' => 'parcelforce_express48_large',
		'special_services' => array(
		),
		'rules' => array( 
			'uk_weight_0-2kg' 	=> 30.30,
			'uk_weight_2-5kg' 	=> 31.32,
			'uk_weight_5-10kg' 	=> 34.74,
			'uk_weight_10-15kg' => 41.88,
			'uk_weight_15-20kg' => 46.98,
			'uk_weight_20-25kg' => 58.26,
			'uk_weight_25-30kg' => 62.40,
		)
	),
);