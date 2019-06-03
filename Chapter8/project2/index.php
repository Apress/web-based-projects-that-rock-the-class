<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Testing PHP Sessions</title>
<style>
a{
font-size:32px;
padding:5px;
}
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
font-size:48px;
color:fuchsia;
}
.center{
text-align:center;
background-color:yellow;
}
.center2{
text-align:center;
}
.div1 {
    display: inline-block;
}
</style>
</head>
<body>

<?php    
if(isset($_POST['s1'])){
$_SESSION["favcolor"] = "orange";
echo '
<script>
document.body.style.background = "orange";
</script>
';
} else if(isset($_POST['s2'])){
$_SESSION["favcolor"] = "lightblue";
echo '
<script>
document.body.style.background = "lightblue";
</script>
';
} else if(isset($_POST['s3'])){
$_SESSION["favcolor"] = "lime";
echo '
<script>
document.body.style.background = "lime";
</script>
';
} else if(isset($_POST['s4'])){
session_unset();
session_destroy();
echo '
<script>
document.body.style.background = "white";
</script>
';
}
?>


<div class="center">
<div class="div1">
<p>Choose a background color:</p> 
</div>
<div class="div1">
<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" name="s1" value="" style="width:50px;height:50px;border:0;background-color:orange;border:1px solid white;">
</div>
<div class="div1">
<input type="submit" name="s2" value="" style="width:50px;height:50px;border:0;background-color:lightblue;border:1px solid white;">
</div>
<div class="div1">
<input type="submit" name="s3" value="" style="width:50px;height:50px;border:0;background-color:lime;border:1px solid white;">
</div>
<div class="div1">
<input type="submit" name="s4" value="" style="width:50px;height:50px;border:0;background-color:white;border:1px solid white;">
</form>
</div>
</div>


<br><br><br>
<div class="center2">
<div class="div1">
<a href="page1.php">Books</a>
</div>
<div class="div1">
<a href="page2.php">Magazines</a>
</div>
</div>
</body>
</html>
