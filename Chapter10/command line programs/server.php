<?php 

// Set the IP address and port number the server will listen on 
$address = '192.168.1.100'; 
$port = 33000; 

// Create the server socket, a TCP Stream socket 
$server = socket_create(AF_INET, SOCK_STREAM, 0); 

// Bind the socket to an IP address / port number pair 
socket_bind($server, $address, $port) or die('Could not bind to address'); 

// Start listening for connections 
socket_listen($server); 

//loop for and listen for connections 
while (true) {

// Accept incoming requests and handle them as child processes  
    $client = socket_accept($server) or die("Could not accept incoming connection\n"); 
    
   if($client){ 
    // Read client input of 1024 bytes 
    $input = socket_read($client, 1024) or die("Could not read input\n"); 
    
    // Strip all white spaces from input 
    $output = strtoupper($input); 
    
    // Send $output back to client 
    socket_write($client, "you wrote " . $output . "\n") or die("Could not write output\n");     

    // Close the client socket 
   socket_close($client); 
   }
}

?>
