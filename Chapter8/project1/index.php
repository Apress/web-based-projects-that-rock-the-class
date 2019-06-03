

<?php  
if(isset($_POST)){
if (!(isset($_COOKIE["username"])) && (isset($_POST['t1']))){ 
setcookie("username", $_POST['t1'], time()+3600); //1 hour
}  
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Testing Cookies</title>
<style>
.p1{
color:blue;
font-size:32px;
text-align:center;
}
input{
color:blue;
font-size:32px;
}
.smiley{
color:orange;
font-size:160px;
text-align:center;
}
.center{
margin:auto;
}
</style>
</head>
<body>


<p class="p1">
<?php
if(isset($_COOKIE["username"])){
    echo "Hi " . htmlspecialchars($_COOKIE["username"]) . " I can see it is you!";
    echo '<p class="smiley">&#x1f603;</p>';
} else{
    echo "Welcome to the site!";
    echo '<p class="smiley">&#x1f604;</p>';
}
?>
<p>





<div class="center">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<p class="p1">Please enter your first name: <input type="text" name="t1">
</p>
</form>
</div>





</body>
</html>
