<!DOCTYPE html>

<html>

<head>

<title>Client side and Server side programs</title>

<style>

input{

font-size:24px;

text-align:right;

background-color:lime;

}

input[type="submit"], input[type="button"] {

background-color:yellow;

color:lime;

}

button{

font-size:24px;

color:lime;

background-color:yellow;

}

span{

font-size:24px;

color:lime;

}

</style>

</head>

<body>

<?php

if (isset($_GET["t1"])){

$t1 = $_GET["t1"];

}

if (isset($_GET["t2"])){

$t2 = $_GET["t2"];

}

if (isset($_GET["t3"])){

$t3 = $_GET["t3"];

}

if (isset($_GET["t4"])){

$t4 = $_GET["t4"];

}

if (isset($_GET["t5"])){

$t5 = $_GET["t5"];

}

if (isset($t4) && isset($t5)){

$t6 = $t4 + $t5;

}

?>

<form name="f1" action="addition2.php" method="GET">

<div>

<span>Add using JavaScript: </span>

<input type = "text" id="t1" name = "t1" size=5 value = "<?php echo $t1 ?>" >

<span>+</span>

<input type = "text" id="t2" name = "t2" size=5 value = "<?php echo $t2 ?>" >

<input type="button" value="=" onclick="function1()">

<input type = "text" id="t3" name = "t3" size=5 value = "<?php echo $t3 ?>" >

</div>

<br>

<div>

<span>Add using PHP: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

<input type = "text" name = "t4" size=5 value = "<?php echo $t4 ?>" >

<span>+</span>

<input type = "text" name = "t5" size=5 value = "<?php echo $t5 ?>" >

<input type="submit" value="=">

<input type = "text" name = "t6" size=5 value = "<?php echo $t6 ?>" >

</div>

</form>

<script>

function function1() {

var x = Number(document.getElementById("t1").value);

if (isNaN(x)) {

alert("Please enter a number");

return false;

}

var y = Number(document.getElementById("t2").value);

if (isNaN(y)) {

alert("Please enter a number");

return false;

}

var z = x + y;

document.getElementById("t3").value = z;

}

</script>

</body>

</html>
