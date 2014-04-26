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
### javascript
### embed
## Function
### center(latitude, longitude, boolean)
### address(string)
### add_marker(array)
### size(width, height)
### zoom(int)
### output()
