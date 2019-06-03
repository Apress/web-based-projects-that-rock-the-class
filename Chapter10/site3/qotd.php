<!DOCTYPE html>

<html>


<head>


</head>


<body>


<?php


if($_POST['var1'] == "1") {


  $host = gethostbyname("cygnus-x.net");


} elseif($_POST['var1'] == "2") {


  $host = gethostbyname("djxmmx.net");


}


  $port = 17;


  $socket = socket_create(AF_INET , SOCK_STREAM , SOL_TCP);  


  $connection = socket_connect($socket , $host ,  $port);


  $result = socket_read ($socket, 512);


  socket_close($socket);


  echo $result;


?>


</body>


</html>
