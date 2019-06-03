<?php
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
background-color:brown;
}
.center {
    margin: auto;
    width: 80%;
    border: 3px solid black;
    padding: 10px;
    background-color:lightsalmon;
}
.center2 {
    margin: auto;
    width: 70%;
    border: none;
    padding: 10px;
    background-color:brown;
}
p{
text-align:center;
font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
font-size:32px;
font-weight:italic;
}
input{
border-color:#9F0251;
font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
font-size:32px;
color:black;
padding:10px;
background-color:lightsalmon;
}
input[type=submit]{
background-color:brown;
color:lightsalmon;
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
</style>
</head>

<body>




<?php
if (isset($_POST['s1'])) {
 $user = $_POST["user"];
 $pass = $_POST["pass"];

if((empty($user)) || (empty($pass))) {
echo '<p style="color:white">Please complete the username and the password. </p>';
} else {
verify_password($user, $pass);
}
}


function verify_password($user, $pass) {

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$user = mysqli_real_escape_string($mysqli, $user);
$sql = "SELECT password FROM user WHERE username='$user'";
if($query = mysqli_query($mysqli, $sql)) {
$rows = mysqli_num_rows($query);
}

if ($rows == 1) {
$row = mysqli_fetch_assoc($query); 
$dbstored_pass=$row['password'];
$isValid = password_verify($pass, $dbstored_pass);
if ($isValid){
$_SESSION['session_user']=$user; 
header("location: profile.php"); 
}
} else {
echo '<p>Username or Password is invalid</p>';
}


$mysqli->close();

}

?>

<br><br><br><br><br><br>
<div class="center">
<form name="f1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<p>Username: <input type="text" name="user">
</p>
<p>Password: <input type="password" name="pass">
</p>
<p><input type="submit" name="s1" value="&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;">
</p>
</form>
</div>

<div class="center2">
<p><a href="index.php">Home</a></p>
</p>
</body>
</html>
