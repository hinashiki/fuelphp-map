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
/**
 * Output Static Maps API
 *
 * @reference https://developers.google.com/maps/documentation/staticmaps/index?hl=ja#Limits
 */

namespace Map;

class Map_Driver_Static extends \Map_Driver
{
	const BASE_URL = 'http://maps.googleapis.com/maps/api/staticmap';

	protected function _output()
	{
		// TODO: check lng, lat paramator and throw Exception
		$query = http_build_query(array(
			'key'    => \Config::get('map.google.api_key.browser'),
			'center' => $this->_center_lat.','.$this->_center_lng,
			'zoom'   => $this->_zoom,
			'size'   => $this->_width.'x'.$this->_height,
			'sensor' => 'false',
		));
		// add markers
		foreach($this->_markers as $marker)
		{
			$mquery = array();
			$cmn = array('size', 'label', 'color');
			foreach($cmn as $c)
			{
				if(isset($marker[$c]))
				{
					$mquery[] = $c.':'.$marker[$c];
				}
			}
			// lat,lng
			$mquery[] = $marker['lat'].','.$marker['lng'];

			// %7C = | (urlencode)
			$query .= '&markers='.implode('%7C', $mquery);
		}

		return '<img src="'.self::BASE_URL.'?'.$query.'" width="'.$this->_width.'" height="'.$this->_height.'" />';
	}
}
