<!DOCTYPE html>
<html>
<head>
<title>PHP Form Validation</title>
<style>
h1{
color:orange;
}
.error{
color:red;
font-size:20px;
}
label{
color:blue;
font-size:24px;
}
input{
color:blue;
font-size:24px;
background-color:orange;
}
</style>
</head>

<body>
<?php
 $errormsg1="";
 $errormsg2="";
 $errormsg3="";
 $valid1=false;
 $valid2=false;
 $valid3=false;

if (isset($_POST['submit'])) 
{

 $name=$_POST["name"];
 $email=$_POST["email"];
 $code=$_POST["code"];
 

 if(empty($name) || is_numeric($name))
 {
 $errormsg1.='<p class="error">* Please enter a valid name.</p>';
 $valid1=false;
 }
 else
 {
 if(is_string($name))
 $valid1=true;
 else
 {
 $errormsg1.='<p class="error">* Please use valid characters.</p>';
 $valid1=false;
 }
 }
 
 if(empty($email) || is_numeric($email))
 {
 $errormsg2.='<p class="error"> * Please enter your e-mail.</p>';
 $valid2=false;
 }
 else
 {
 if(is_string($email))
 $valid2=true;
 else
 {
 $errormsg2.='<p class="error">* Please use valid characters.</p>';
 $valid2=false;
 }
 }
  
 if(empty($code))
 {
 $errormsg3.='<p class="error">* Please enter your code number.</p>';
 $valid3=false;
 }
 else
 {
 $len=strlen($code);
 
 if($len==10)
 $valid3=true;
 else
 {
 $errormsg3.='<p class="error">* Code should be in alphabetic letters and numerical digits format with 10 characters in it.</p>';
 $valid3=false;
 }
 }
 

 if($valid1==true && $valid2==true && $valid3==true)
 header("Location:process.php? code=$code&name=$name&email=$email");
}
?>

<h1>Submit your name, your e-mail, and your code</h1>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 
<label for="name">Full Name:</label>
<input type="text" name="name"><br>
<?php
 if((errormsg1!="") && isset($_POST['submit']))
 echo $errormsg1;
?>
<label for="email">E-mail:</label>
<input type="text" name="email"><br>
<?php
 if((errormsg2!="") && isset($_POST['submit']))
 echo $errormsg2;
?>
<label for="code">Code:</label>
<input type="text" name="code"><br>
<?php
 if((errormsg3!="") && isset($_POST['submit']))
 echo $errormsg3;
?>
<input type="submit" name="submit" value="Go">
</form>

</body>
</html>

