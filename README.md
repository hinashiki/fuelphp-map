# Setup
at first, please copy config/map.php, and write your API KEY

ex.

    return array(
      'google' => array(
        'api_key' => array(
          'browser' => 'xxxxxxx',
        ),
      ),
    );

- - -
# Usage
`echo Map::forge()->center($latitude, $longitude)->output();`
## Type
### static (default)
`echo Map::forge('static')->center($latitude, $longitude)->output();`
### javascript
`echo Map::forge('javascript')->center($latitude, $longitude)->output();`
### embed
`echo Map::forge('embed')->address($real_address)->output();`
## Function
### center(latitude, longitude, boolean)
### address(string)
### add_marker(array)
### size(width, height)
### zoom(int)
### output()
