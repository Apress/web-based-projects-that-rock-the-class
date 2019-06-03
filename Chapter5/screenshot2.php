

<html>

<head>

<style>

body {

background-color:yellow;

}

</style>

</head>

<body>

<?php

if(!empty($_POST['url'])){

$url = $_POST["url"];

$fp = fopen("lock.txt", "w");

if (flock($fp, LOCK_EX)) {

$command = "xvfb-run --server-args=\"-screen 0, 1366x768x24\" wkhtmltoimage --crop-w 1366 --crop-h 768 " . $url . " /var/www/html/ch05/php2.png";

exec($command, $out, $status);

if ($status===0) {

$command2 = "convert -resize 50% /var/www/html/ch05/php2.png /var/www/html/ch05/php2.png";

shell_exec($command2);

echo '<img style="display:block;margin-left:auto;margin-right:auto;" src="php2.png">';

} else {

echo '<div><p style="font-size:80px;color:darkblue;text-align:center;">Please enter a valid URL.</p></div>';

echo '<div><a href="index.php">';

echo '<button style="font-size:80px;color:yellow;background-color:darkblue;margin:auto;display:block;">Go Back</button>';

echo '</a></div>';

}

flock($fp, LOCK_UN);

}

fclose($fp);

}

?>

</body>

</html>






