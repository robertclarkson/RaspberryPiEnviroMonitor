<?php

class Reading extends DataObject {


	// {
	// 'acc': '0.04364013671875,0.24969482421875,1.0257568359375', 
	// 'press': 95710.75158027429, 
	// 'rgb': '101,109,113', 
	// 'soiltemp': 0.723, 
	// 'temp': 30.849656773641982, 
	// 'moist': 3.104, 
	// 'lux': 5114, 
	// 'heading': 181.65
	// }

	private static $db = array(
		'press' => 'Decimal(20,11)'
		'rgb' => 'Varchar(11)',
		'soiltemp' => 'Decimal(4,3)',
		'temp' => 'Decimal(4,2)',
		'moist' => 'Decimal(4,3)',
		'lux' => 'Int'
	);

}