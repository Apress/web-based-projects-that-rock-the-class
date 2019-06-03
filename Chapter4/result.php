<!DOCTYPE html>
<html>

<body>
<span style="color:red;text-align:left;font-size:32px;background-color:blue;float:left">
Online WHOIS Service
</span>
<span style="color:yellow;text-align:right;font-size:32px;background-color:blue;float:right">
<?php echo "Your IP address: " . $_SERVER['REMOTE_ADDR']; ?>
</span>

<?php
echo '<h1 style="color:blue;text-align:center"> whois ' . $_POST['user_data'] . '</h1>';

echo '<p style="font-family:monospace;font-size:16px;background-color:black;color:white">';

$user_data = $_POST['user_data'];

if (isset($user_data)) {
 

   $exec_string = "whois $user_data";

   $output = shell_exec($exec_string);

   $stream = fopen('data://text/plain,' . $output,'r');

   while(! feof($stream)) {

       $x = fgets($stream);

       if((strpos(trim($x), '%') === 0) || (strpos(trim($x), '#') === 0))

       continue;

       echo $x;

       echo "<br>";

   }

}
echo '</p>';
?>

</body>
</html>
