<!DOCTYPE html>

<html>


<head>


<title>Quote of the Day</title>


<style>


body {


background-color:lime;


}


select{


padding:20px;


font-size:32px;


color:navy;


background-color:yellow;


}


#demo{


color:deepskyblue;


padding:20px;


font-size:24px;


}


p{


text-align:center;


}


</style>


</head>


<body>


<p>


<select name="sel1" id="sel1" onchange="sendRequest()">


    <option value="-1">Select a QOTD server</option>


    <option value="1">QOTD server 1</option> 


    <option value="2">QOTD server 2</option>


</select>


</p>


<script>


function sendRequest() {


if ((document.getElementById("sel1").value == 1) || (document.getElementById("sel1").value == 2)){


  var xhr = new XMLHttpRequest();


  xhr.onreadystatechange = function() {


    if (xhr.readyState == 4 && xhr.status == 200) {


      document.getElementById("demo").innerHTML = xhr.responseText;


    }


  };


  xhr.open("POST", "qotd.php", true);


  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


  var data = document.getElementById("sel1").value;


  xhr.send(`var1=${data}`);


  document.getElementById("demo").style.backgroundColor = "yellow";


} else{


  document.getElementById("demo").style.backgroundColor = "lime";


  document.getElementById("demo").innerHTML = "";


  }


}


</script>


<div>


<p id="demo"></p>


</div>


</body>


</html>
