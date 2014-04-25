<?php
/**
 * Maps API call
 *
 * @package    Map
 * @version    0.1
 * @author     Hinashiki
 * @license    MIT License
 * @copyright  2014 - Hinashiki
 * @link       currently none.
 */

Autoloader::add_namespace('Map', __DIR__.'/classes/');
Autoloader::add_core_namespace('Map');

Autoloader::add_classes(array(
	/**
	 * Map classes.
	 */
	'Map\\Map'                    => __DIR__.'/classes/map.php',
	'Map\\Map_Driver'             => __DIR__.'/classes/map/driver.php',
	'Map\\Map_Driver_Static'      => __DIR__.'/classes/map/driver/static.php',
	'Map\\Map_Driver_Embed'       => __DIR__.'/classes/map/driver/embed.php',
	'Map\\Map_Driver_Javascript'  => __DIR__.'/classes/map/driver/javascript.php',
));
