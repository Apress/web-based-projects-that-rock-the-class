<!DOCTYPE html>
<html>
<head>
<style>
body{
background-color:lightsteelblue;
}
p{
text-align:center;
font-size:32px;
}
</style>
</head>
<body>

<?php

  if(isset($_POST["t1"])) {
  $text = $_POST["t1"];
  }

  $host = "192.168.1.100";
  $port = 33000;

  $socket = socket_create(AF_INET , SOCK_STREAM , 0);  
  $connection = socket_connect($socket , $host ,  $port);
  socket_write($socket, $text, strlen($text));
 
  $result = socket_read ($socket, 1024);

  socket_close($socket);

  echo "<p>" . $result . "</p>";

?>


</body>
</html>

