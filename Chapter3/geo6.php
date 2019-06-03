<!DOCTYPE html>
<html>
<head>
<style>
body{
background-color:#B9D6E5;
}
.center {
margin: auto;
}
p{
text-align: center;
}
</style>
</head>
<body>
<div class="center">
<p>

<?php

echo '<h1 style="text-align:center">Your position on the map is in&nbsp;';

echo $_SERVER['GEOIP_CITY'];

echo ',&nbsp;';

echo $_SERVER['GEOIP_COUNTRY_NAME'];

echo '</h1>';

echo '<p><img width="600" src="https://static-maps.yandex.ru/1.x/?lang=en-US&ll=';

echo $_SERVER['GEOIP_LONGITUDE'];

echo ',';

echo $_SERVER['GEOIP_LATITUDE'];

echo '&z=4&l=map&size=600,300&pt='. $_SERVER['GEOIP_LONGITUDE'] . ',' . $_SERVER['GEOIP_LATITUDE'] . ',pm2rdl' . '"></p>';

echo '</body></html>';

?>

</p>
</div>
</body>
</html>
