<?php
return array(
	// For Insurance
	'price_0-50' 		=> array( 'min_price' => 0, 'max_price' => 50,),
	'price_0-500' 		=> array( 'min_price' => 0, 'max_price' => 500,),
	'price_50-1000' 	=> array('min_price' => 50,'max_price' => 1000,),
	'price_500-1000' 	=> array('min_price' => 500,'max_price' => 1000,),
	'price_1000-2500' 	=> array('min_price' => 1000,'max_price' => 2500,),

	// for parcel force
	'uk_weight_0-2kg' 		=> array('min_weight' => 0,	'max_weight' => 2, 	'zone' => array('uk'), ),
	'uk_weight_2-5kg' 		=> array('min_weight' => 2,	'max_weight' => 5, 	'zone' => array('uk'), ),
	'uk_weight_5-10kg' 		=> array('min_weight' => 5,	'max_weight' => 10, 'zone' => array('uk'), ),
	'uk_weight_10-15kg' 	=> array('min_weight' => 10,'max_weight' => 15, 'zone' => array('uk'), ),
	'uk_weight_15-20kg' 	=> array('min_weight' => 15,'max_weight' => 20, 'zone' => array('uk'), ),
	'uk_weight_20-25kg' 	=> array('min_weight' => 20,'max_weight' => 25, 'zone' => array('uk'), ),
	'uk_weight_25-30kg' 	=> array('min_weight' => 25,'max_weight' => 30, 'zone' => array('uk'), ),
	
	'uk_0-0.1kg' 		=> array('min_weight' => 0,'max_weight' => 0.1,'zone' => array('uk'),),
	'uk_0.1-0.5kg' 		=> array('min_weight' => 0.1,'max_weight' => 0.5,'zone' => array('uk'),),
	'uk_0.5-1kg' 		=> array('min_weight' => 0.5,'max_weight' => 1,'zone' => array('uk'),),
	'uk_1-2kg' 			=> array('min_weight' => 1,'max_weight' => 2,'zone' => array('uk'),),
	'uk_2-10kg'			=> array('min_weight' => 2,'max_weight' => 10,'zone' => array('uk'),),
	'uk_10-20kg' 		=> array('min_weight' => 10,'max_weight' => 20,'zone' => array('uk'),),

	
	'uk_0-0.1kg_letter' 			=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('uk'), 'box' => 'letter', ),
	'uk_0-0.1kg_largeletter' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('uk'), 'box' => 'large-letter', ),
	'uk_0.1-0.250kg_largeletter' 	=> array( 'min_weight' => 0.1,'max_weight' => 0.25,'zone' => array('uk'),'box' => 'large-letter',),
	'uk_0.250-0.500kg_largeletter' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('uk'), 'box' => 'large-letter',),
	'uk_0.500-0.750kg_largeletter' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('uk'), 'box' => 'large-letter',),
	'uk_0-1kg_smallparcel' 			=> array( 'min_weight' => 0, 'max_weight' => 1, 'zone' => array('uk'), 'box' => 'small-parcel', ),
	'uk_1-2kg_smallparcel' 			=> array( 'min_weight' => 1, 'max_weight' => 2, 'zone' => array('uk'), 'box' => 'small-parcel',),
	'uk_0-1kg_mediumparcel' 		=> array( 'min_weight' => 0, 'max_weight' => 1, 'zone' => array('uk'), 'box' => 'medium-parcel', ),
	'uk_1-2kg_mediumparcel' 		=> array( 'min_weight' => 1, 'max_weight' => 2, 'zone' => array('uk'), 'box' => 'medium-parcel', ),
	'uk_2-5kg_mediumparcel' 		=> array( 'min_weight' => 2, 'max_weight' => 5, 'zone' => array('uk'), 'box' => 'medium-parcel',),
	'uk_5-10kg_mediumparcel' 		=> array( 'min_weight' => 5, 'max_weight' => 10, 'zone' => array('uk'), 'box' => 'medium-parcel', ),
	'uk_10-20kg_mediumparcel' 		=> array( 'min_weight' => 10, 'max_weight' => 20, 'zone' => array('uk'), 'box' => 'medium-parcel', ),


	//Internatianl 
	// Europ
	
	//letter
	'eu_0-0.01kg_letter' 	=> array( 'min_weight' => 0, 'max_weight' => 0.01, 'zone' => array('eur','eu'), 'box' => 'letter',),
	'eu_0.01-0.02kg_letter' => array( 'min_weight' => 0.1, 'max_weight' => 0.02, 'zone' => array('eur','eu'), 'box' => 'letter', ),
	'eu_0.02-0.1kg_letter' 	=> array( 'min_weight' => 0.02, 'max_weight' => 0.1, 'zone' => array('eur','eu'), 'box' => 'letter',),

	//Large letter
	'eu_0-0.1kg_largeletter' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),
	'eu_0.1-0.250kg_largeletter' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),
	'eu_0.250-0.500kg_largeletter' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),
	'eu_0.500-0.750kg_largeletter' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),

	//small parcel
	'eu_0-0.1kg_smallparcel' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_0.1-0.250kg_smallparcel' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_0.250-0.500kg_smallparcel' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_0.500-0.750kg_smallparcel' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_0.750-1kg_smallparcel' 		=> array( 'min_weight' => 0.75, 'max_weight' => 1, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_1-1.25kg_smallparcel' 		=> array( 'min_weight' => 1, 'max_weight' => 1.25, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_1.25-1.5kg_smallparcel' 	=> array( 'min_weight' => 1.25, 'max_weight' => 1.5, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_1.5-1.75kg_smallparcel' 	=> array( 'min_weight' => 1.5, 'max_weight' => 1.75, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'eu_1.75-2kg_smallparcel' 		=> array( 'min_weight' => 1.75, 'max_weight' => 2, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),

	// World zone 1
	'w1_0-0.01kg_letter' 	=> array( 'min_weight' => 0, 'max_weight' => 0.01, 'zone' => array('w1'), 'box' => 'letter', ),
	'w1_0.01-0.02kg_letter' => array( 'min_weight' => 0.1, 'max_weight' => 0.02, 'zone' => array('w1'), 'box' => 'letter', ),
	'w1_0.02-0.1kg_letter' 	=> array( 'min_weight' => 0.02, 'max_weight' => 0.1, 'zone' => array('w1'), 'box' => 'letter', ),

	//Large letter
	'w1_0-0.1kg_largeletter' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('w1'), 'box' => 'large-letter', ),
	'w1_0.1-0.250kg_largeletter' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('w1'), 'box' => 'large-letter', ),
	'w1_0.250-0.500kg_largeletter' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('w1'), 'box' => 'large-letter', ),
	'w1_0.500-0.750kg_largeletter' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('w1'), 'box' => 'large-letter', ),

	//small parcel
	'w1_0-0.1kg_smallparcel' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_0.1-0.250kg_smallparcel' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_0.250-0.500kg_smallparcel' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_0.500-0.750kg_smallparcel' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_0.750-1kg_smallparcel' 		=> array( 'min_weight' => 0.75, 'max_weight' => 1, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_1-1.25kg_smallparcel' 		=> array( 'min_weight' => 1, 'max_weight' => 1.25, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_1.25-1.5kg_smallparcel' 	=> array( 'min_weight' => 1.25, 'max_weight' => 1.5, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_1.5-1.75kg_smallparcel' 	=> array( 'min_weight' => 1.5, 'max_weight' => 1.75, 'zone' => array('w1'), 'box' => 'small-parcel', ),
	'w1_1.75-2kg_smallparcel' 		=> array( 'min_weight' => 1.75, 'max_weight' => 2, 'zone' => array('w1'), 'box' => 'small-parcel', ),


	// World zone 2
	'w2_0-0.01kg_letter' 	=> array( 'min_weight' => 0, 'max_weight' => 0.01, 'zone' => array('w1'), 'box' => 'letter', ),
	'w2_0.01-0.02kg_letter' => array( 'min_weight' => 0.1, 'max_weight' => 0.02, 'zone' => array('w1'), 'box' => 'letter', ),
	'w2_0.02-0.1kg_letter' 	=> array( 'min_weight' => 0.02, 'max_weight' => 0.1, 'zone' => array('w1'), 'box' => 'letter', ),

	//Large letter
	'w2_0-0.1kg_largeletter' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('w1'), 'box' => 'large-letter', ),
	'w2_0.1-0.250kg_largeletter' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('w1'), 'box' => 'large-letter', ),
	'w2_0.250-0.500kg_largeletter' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('w1'), 'box' => 'large-letter', ),
	'w2_0.500-0.750kg_largeletter' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('w1'), 'box' => 'large-letter', ),

	//small parcel
	'w2_0-0.1kg_smallparcel' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_0.1-0.250kg_smallparcel' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_0.250-0.500kg_smallparcel' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_0.500-0.750kg_smallparcel' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_0.750-1kg_smallparcel' 		=> array( 'min_weight' => 0.75, 'max_weight' => 1, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_1-1.25kg_smallparcel' 		=> array( 'min_weight' => 1, 'max_weight' => 1.25, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_1.25-1.5kg_smallparcel' 	=> array( 'min_weight' => 1.25, 'max_weight' => 1.5, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_1.5-1.75kg_smallparcel' 	=> array( 'min_weight' => 1.5, 'max_weight' => 1.75, 'zone' => array('w2'), 'box' => 'small-parcel', ),
	'w2_1.75-2kg_smallparcel' 		=> array( 'min_weight' => 1.75, 'max_weight' => 2, 'zone' => array('w2'), 'box' => 'small-parcel', ),

	// International Tracked
	// letter
	'noneu_0-0.01kg_letter' 			=> array( 'min_weight' => 0, 'max_weight' => 0.01, 'zone' => array('eu'), 'box' => 'letter', ),
	'noneu_0.01-0.02kg_letter' 			=> array( 'min_weight' => 0.01, 'max_weight' => 0.02, 'zone' => array('eu'), 'box' => 'letter', ),
	'noneu_0.02-0.1kg_letter' 			=> array( 'min_weight' => 0.02, 'max_weight' => 0.1, 'zone' => array('eu'), 'box' => 'letter', ),
	// Large Letter
	'noneu_0-0.1kg_largeletter' 		=> array( 'min_weight' => 1, 'max_weight' => 0.1, 'zone' => array('eu'), 'box' => 'largeletter', ),
	'noneu_0.1-0.250kg_largeletter' 	=> array( 'min_weight' => 1.1, 'max_weight' => 0.25, 'zone' => array('eu'), 'box' => 'largeletter', ),
	'noneu_0.250-0.500kg_largeletter' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('eu'), 'box' => 'largeletter', ),
	'noneu_0.500-0.750kg_largeletter' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('eu'), 'box' => 'largeletter', ),
	//small parce
	'noneu_0-0.1kg_smallparcel' 		=> array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_0.1-0.250kg_smallparcel' 	=> array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_0.250-0.500kg_smallparcel' 	=> array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_0.500-0.750kg_smallparcel' 	=> array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_0.750-1kg_smallparcel' 		=> array( 'min_weight' => 0.75, 'max_weight' => 1, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_1-1.25kg_smallparcel' 		=> array( 'min_weight' => 1, 'max_weight' => 1.25, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_1.25-1.5kg_smallparcel' 		=> array( 'min_weight' => 1.25, 'max_weight' => 1.5, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_1.5-1.75kg_smallparcel' 		=> array( 'min_weight' => 1.5, 'max_weight' => 1.75, 'zone' => array('eu'), 'box' => 'smallparcel', ),
	'noneu_1.75-2kg_smallparcel' 		=> array( 'min_weight' => 1.75, 'max_weight' => 2, 'zone' => array('eu'), 'box' => 'smallparcel', ),

	// for International Economy
	'0-0.01kg_letter' => array( 'min_weight' => 0, 'max_weight' => 0.01, 'box' => 'letter', ),
	'0.01-0.02kg' => array( 'min_weight' => 0.1, 'max_weight' => 0.02, 'box' => 'letter', ),
	'0.02-0.1kg' => array( 'min_weight' => 0.2, 'max_weight' => 0.1, 'zone' => array('eur','eu'), 'box' => 'letter', ),

	'0-0.1kg' => array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),
	'0.1-0.250kg' => array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),
	'0.250-0.500kg' => array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),
	'0.500-0.750kg' => array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eur','eu'), 'box' => 'large-letter', ),

	'0-0.1kg' => array( 'min_weight' => 0, 'max_weight' => 0.1, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'0.1-0.250kg' => array( 'min_weight' => 0.1, 'max_weight' => 0.25, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'0.250-0.500kg' => array( 'min_weight' => 0.25, 'max_weight' => 0.5, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'0.500-0.750kg' => array( 'min_weight' => 0.5, 'max_weight' => 0.75, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'0.750-1kg' => array( 'min_weight' => 0.75, 'max_weight' => 1, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'1-1.250kg' => array( 'min_weight' => 1, 'max_weight' => 1.25, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'1.250-1.500kg' => array( 'min_weight' => 1.25, 'max_weight' => 1.5, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'1.500-1.750kg' => array( 'min_weight' => 1.5, 'max_weight' => 1.75, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
	'1.750-2kg' => array( 'min_weight' => 1.75, 'max_weight' => 2, 'zone' => array('eur','eu'), 'box' => 'small-parcel', ),
);