<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<style>
body{
background-color:<?php
if(isset($_SESSION["favcolor"])){
echo $_SESSION["favcolor"] . ";"; 
} else {
echo "white;"; 
}
?>
}
p{
text-align:center;
font-size:48px;
}
.center{
text-align:center;
}
</style>

</head>
<body>
<div>
<p>Magazines</p>
</div>
<div class="center">
<a href="index.php">Home</a>
</div>
</body>
</html>
