


<!DOCTYPE html>
<html>
<head>
<title>Location on the map</title>
</head>
<body>
<h1>Your position on the map is in&nbsp;
<?php
echo $_SERVER['GEOIP_CITY']
. ',&nbsp;'
. $_SERVER['GEOIP_COUNTRY_NAME']
. '</h1><img width="600" src="https://static-maps.yandex.ru/1.x/?lang=en-US&ll='
. $_SERVER['GEOIP_LONGITUDE']
. ','
. $_SERVER['GEOIP_LATITUDE']
. '&z=8&l=map&size=600,300"></body></html>';
?>
</body>
</html>





