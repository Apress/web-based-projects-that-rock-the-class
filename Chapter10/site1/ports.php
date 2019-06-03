<!DOCTYPE HTML>

<html>


<head>


<title>Port Scanning</title>


</head>


<body>





<?php





$host = $_SERVER['REMOTE_ADDR'];





if (isset($_POST['s1'])){





  $port = intval($_POST["port"]);


  if (isset($port)) {





  $socket = socket_create(AF_INET , SOCK_STREAM , SOL_TCP);  


  $connection = socket_connect($socket , $host ,  $port);





  echo '


  <script>


  alert("Port number ';


  echo $port;


  echo ' is';


  


  if (!$connection){


    echo ' not';


  }


  


  echo ' open.");


  window.location = "index.php";


  </script>';





  }


}


 


?>

</body>
</html>
