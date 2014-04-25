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

namespace Map;

class Map
{
	/**
	 * Instance for singleton usage.
	 */
	public static $_instance = false;

	/**
	 * Driver config defaults.
	 */
	protected static $_defaults;

	/**
	 * Init, config loading.
	 */
	public static function _init()
	{
		\Config::load('map', true);
		static::$_defaults = \Config::get('map.default');
	}


	/**
	 * return driver instance
	 *
	 * @return  Map_Driver  one of the map drivers
	 */
	public static function forge($driver = null)
	{
		// $driver > $config['default'] > static::$_defaults
		if($driver === null)
		{
			$driver = static::$_defaults;
		}
		$driver_class_name = '\\Map_Driver_'.ucfirst(strtolower($driver));

		if( ! class_exists($driver_class_name, true))
		{
			throw new \FuelException('Could not find Map driver: '.$driver_class_name.' ('.$driver.')');
		}

		$driver = new $driver_class_name();

		return $driver;
	}

}
