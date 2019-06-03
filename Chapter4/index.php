<!DOCTYPE html>

<html>

<head>

<title>

Online WHOIS service

</title>

<link rel="icon" href="favicon.png"/>

<style>

p.large {

font-size:32px;

color:red;

background-color:blue;

display:inline;

}

p.small {

font-size:16px;

color:white;

background-color:black;

display:inline;

padding: 15px 32px;

}

input {

    background-color: black;

    border: none;

    color: white;

    padding: 15px 32px;

    text-align: center;

    font-size: 16px;

}

</style>

</head>

<body>

<p class="large">Online WHOIS service</p>

<br><br>

<form method="POST" action="result.php" name="f1" onsubmit="return validate()">

<p class="small">IP address: </p>&nbsp;&nbsp;

<input type="text" name="user_data">&nbsp;&nbsp;

<input type="submit" value="Go">

</form>

<script>

function validate() { 

var f = document.forms["f1"]["user_data"].value;

f=f.trim();

var ipformat = /^((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])$/

if(!(f.match(ipformat))){

alert("Enter a valid IP address");

return false;

}

}

</script>

</body>

</html>
