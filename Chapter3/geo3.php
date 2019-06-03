 

 <!DOCTYPE html>

<html>

<head>

<style>

p {

font-size:80px;

color:red;

}

</style>

</head>

<body>


<?php

 

$cc = $_SERVER["GEOIP_COUNTRY_CODE"];

 

switch ($cc) {

    case "US":

    case "UK":

      print "<p>hello</p>";

        break;

    case "FR":

        print "<p>bonjour</p>";

        break;

      default:

      print "<p> &#x1F600; </p>";

}

 

?>

</body>

</html>





