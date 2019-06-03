<?php


$host = "192.168.1.100";
$port = 33000;


$server = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");


$result = socket_connect($server, $host, $port) or die("Could not connect toserver\n");


$prompt = "write your message here: ";

$message = readline($prompt);

socket_write($server, $message, strlen($message)) or die("Could not send data to server\n");

$result = socket_read ($server, 1024) or die("Could not read server response\n");

echo "Reply: " . $result;


socket_close($server);


?>
