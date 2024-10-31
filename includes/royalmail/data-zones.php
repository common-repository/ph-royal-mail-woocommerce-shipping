<?php
return array(
	//GB for Domestic
	'uk' => array('GB'),
	
	//European Union countries
	'eur' => WC()->countries->get_european_union_countries(),

	//Europe excluding GB
	'eu' => array('AL', 'AD', 'AM', 'AT', 'BY', 'BE', 'BA', 'BG', 'CH', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FO', 'FI', 'FR', 'GE', 'GI', 'GR', 'HU', 'HR', 'IE', 'IS', 'IT', 'LT', 'LU', 'LV', 'MC', 'MK', 'MT', 'NO', 'NL', 'PO', 'PT', 'RO', 'RU', 'SE', 'SI', 'SK', 'SM', 'TR', 'UA', 'VA'),
	
	// world_zone_2
	'w2' => array('AU', 'PW', 'IO', 'CX', 'CC', 'CK', 'FJ', 'PF', 'TF', 'KI', 'MO', 'NR', 'NC', 'NZ', 'PG', 'NU', 'NF', 'LA', 'PN', 'TO', 'TV', 'WS', 'AS'),
	
	//rest of the above is world_zone_1
	// 'w1' => array(),
);