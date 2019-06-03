<!DOCTYPE html>
<html>
<head>
<title>Code evaluation</title>
<style>
p{
color:green;
font-size:32px;
}
</style>
</head>
<body>
<p>
<?php

$var=$_GET['code'];
$var2=$_GET['name'];
$var3=$_GET['email'];
if(isset($var) && $var == 'SX1DF908RW')
{
echo nl2br("$var2 congratulations you have entered the lucky code: $var\n You have won one T-shirt. We will contact you soon.");

// Save the user's e-mail for contacting him/her
$filename = "code.txt";
$handle = fopen($filename, "w") or die(" Unable to open file!");
if ($handle)
{
fwrite($handle, $var2);
fwrite($handle, PHP_EOL);
fwrite($handle, $var3);
fwrite($handle, PHP_EOL);
fclose($handle);
}
}
else
{
    echo "You didn't win, please try another time!";
}

?>
</p>
</body>
</html>

