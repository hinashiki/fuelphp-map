<?php
/**
 * Maps API call
 *
 * @package    Map
 * @version    0.1
 * @author     Hinashiki
 * @license    MIT License
 * @copyright  2014 - Hinashiki
 * @link       https://github.com/hinashiki/fuelphp-map
 */


namespace Map;

abstract class Map_Driver
{
	protected $_center_lat = null;
	protected $_center_lng = null;
	protected $_address    = '';
	protected $_zoom       = 15;
	protected $_width      = 400;
	protected $_height     = 400;

	/**
	 * markers
	 * array(
	 *   array(
	 *     'lat'   => n,
	 *     'lng'   => n,
	 *     'label' => string,
	 *     'size'  => 'mid',   // static only
	 *     'color' => ex. red, // static only
	 *   ),
	 *   ....
	 * )
	 *
	 */
	protected $_markers = array();

	/**
	 * add marker
	 *
	 * @param array $marker
	 * @return $this
	 */
	public function add_marker(array $marker)
	{
		if( ! isset($marker['lat']) or ! isset($marker['lng']))
		{
			throw new \PhpErrorException(__METHOD__.': lat and lng are must param.');
		}
		$this->_markers[] = $marker;
		return $this;
	}

	/**
	 * set center latitude and longitude
	 *
	 * @param float   $lat
	 *        float   $lng
	 *        boolean $marker
	 * @return $this
	 */
	public function center($lat, $lng, $marker = false)
	{
		$this->_center_lat = $lat;
		$this->_center_lng = $lng;
		if($marker === true)
		{
			return $this->add_marker(array(
				'lat' => $lat,
				'lng' => $lng,
			));
		}
		return $this;
	}

	/**
	 * set locale address
	 *
	 * @param string $addr
	 * @return $this
	 */
	public function address($addr)
	{
		$this->_address = $addr;
		return $this;
	}

	/**
	 * set zoom
	 *
	 * @param int $zoom
	 * @return $this
	 */
	public function zoom($zoom)
	{
		$this->_zoom = $zoom;
		return $this;
	}

	/**
	 * set size
	 *
	 * @param int $width
	 *        int $height
	 * @return $this
	 */
	public function size($width, $height)
	{
		$this->_width = $width;
		$this->_height = $height;
		return $this;
	}

	/**
	 * output html tag
	 *
	 * @return string html
	 */
	public function output()
	{
		return $this->_output();
	}

	/**
	 * Initiates the output process.
	 *
	 * @return string html
	 */
	abstract protected function _output();

}
