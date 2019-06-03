<html>
<head>
<style>
body{
background-color:brown;
}
.center {
    margin: auto;
    width: 80%;
    border: none;
    padding: 10px;
    background-color:lightsalmon;
}
.center2 {
    margin: auto;
    width: 80%;
    border: none;
    padding: 10px;
    background-color:brown;
}
p{
text-align:center;
font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
font-size:24px;
color:white;
font-weight:italic;
}
input{
border-color:#9F0251;
font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
font-size:24px;
color:black;
padding:5px;
background-color:lightsalmon;
}
input[type=submit],[type=reset]{
background-color:brown;
color:lightsalmon;
padding:5px;
}
a{
text-decoration:none;
}
a:link, a:visited {
    color: lightsalmon;
}
a:hover {
    color: black;
}
label {
  font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
  display: inline-block;
  width: 40%;
  text-align: right;
  color:brown;
  font-size:24px;
}​
</style>
</head>

<body>
<p>The option to create a new account is deactivated, create_entry() is deactivated, because only for two user accounts exist data to the MySQL database: you can try user robert with password ‘123’ and user sophie with password 'supersophie3mi8#m&&'. The original account.php file is <a href="ORIGINAL/account.php">here</a></p>
<?php

 $errormsg1 = ""; 
 $errormsg2 = "";
 $valid1 = 0;
 $valid2 = 0;

if (isset($_POST['s1'])) {

 $first = $_POST["first"];
 $last = $_POST["last"];
 $email = $_POST["email"];
 $user = $_POST["user"];
 $pass1 = $_POST["pass1"];
 $pass2 = $_POST["pass2"];

if((empty($first)) || (empty($last)) || (empty($email)) || (empty($user)) || (empty($pass1)) || (empty($pass2))) {
$errormsg1 = '<p>Please complete all the fields. </p>';
} else {
$valid1 = 1;
}

if((strcmp($pass1, $pass2))) {
$errormsg2 = '<p>Please enter the same password at the Password fields. </p>'; 
} else {
$valid2 = 1;
}

}

if (($valid1 == 1) && ($valid2 == 1)) {
//create_entry($first, $last, $email, $user, $pass1);
}

function create_entry ($first, $last, $email, $user, $pass1) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";



$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$hashed_password = password_hash($pass1, PASSWORD_DEFAULT);
$sql = "INSERT INTO user (first, last, email, username, password) VALUES ('$first', '$last', '$email', '$user', '$hashed_password')";

if(mysqli_query($mysqli, $sql)){
    //echo "Records inserted successfully.";
}else{
      if(mysqli_errno($mysqli) == 1062) {
        echo "<p>duplicate entry</p>";
      }else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
      }
 }
 
$mysqli->close();

}
?>




<?php
 if(($errormsg1 != "") && isset($_POST['s1']))
 echo $errormsg1;
 if(($errormsg2 != "") && isset($_POST['s1']))
 echo $errormsg2;
?>

<br><br>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="center">
<label for="first">First Name: </label><input type="text" name="first">
</div>
<div class="center">
<label for="last">Last Name: </label><input type="text" name="last">
</div>
<div class="center">
<label for="email">E-mail: </label><input type="email" name="email">
</div>
<div class="center">
<label for="user">Username: </label><input type="text" name="user">
</div>
<div class="center">
<label for="pass1">Password: </label><input type="password" name="pass1">
</div>
<div class="center">
<label for="pass2">Retype Password: </label><input type="password" name="pass2">
</div>
<div class="center">
<label for="s1">&nbsp;</label><input type="submit" name="s1" value="Create Account">
</div>
<div class="center">
<label for="r1">&nbsp;</label><input type="reset" name="r1" value="&nbsp;&nbsp;Clear Form&nbsp;&nbsp;">
</div>
</form>
<div class="center2">
<p><a href="index.php">Home</a></p>
</p>
</body>
</html>
