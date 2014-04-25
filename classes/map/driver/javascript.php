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
 * Output Maps JavaScript API v3
 *
 * @reference https://developers.google.com/maps/documentation/javascript/tutorial?hl=ja
 */

namespace Map;

class Map_Driver_Javascript extends \Map_Driver
{
	const BASE_URL   = 'http://maps.googleapis.com/maps/api/js';
	const MAP_DIV_ID = 'googlemap__canvas';

	protected function _output()
	{
		$html = array();
		$html[] = '<div id="'.self::MAP_DIV_ID.'" style="width:'.$this->_width.'px;height:'.$this->_height.'px;"></div>';
		$query = array(
			'key'    => \Config::get('map.google.api_key.browser'),
			'sensor' => 'false',
		);
		$js_url = self::BASE_URL.'?'.http_build_query($query);
		$html[] = '<script type="text/javascript" src="'.$js_url.'"></script>';
		$html[] = '<script type="text/javascript">';
		$html[] = 'function initialize() {';
		$html[] = 'var mapOptions = {';
		$html[] = '  center: new google.maps.LatLng('.$this->_center_lat.','.$this->_center_lng.'),';
		$html[] = '  zoom: '.$this->_zoom.',';
		$html[] = '  mapTypeId: google.maps.MapTypeId.ROADMAP';
		$html[] = '}';
		$html[] = 'var map = new google.maps.Map(document.getElementById("'.self::MAP_DIV_ID.'"), mapOptions);';
		foreach($this->_markers as $marker)
		{
			$html[] = $this->__add_marker($marker);
		}
		$html[] = '}';
		$html[] = 'window.onload = initialize();';
		$html[] = '</script>';
		return implode("\n", $html);
	}

	/**
	 * make marker object
	 * @return string javascript
	 */
	private function __add_marker($marker)
	{
		$html = array();
		$html[] = 'new google.maps.Marker({';
		$html[] = '  position: new google.maps.LatLng('.$marker['lat'].','.$marker['lng'].'),';
		$html[] = '  map: map,';
		$html[] = '  title: "'.\Arr::get($marker, 'label', '').'"';
		$html[] = '});';
		return implode("\n", $html);
	}
}
