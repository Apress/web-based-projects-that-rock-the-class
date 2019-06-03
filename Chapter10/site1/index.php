<!DOCTYPE html>

<html>


<head>


<style>


body{


background-color:orangered;


}


input[type=number]{


    width: 300px;


} 


p{


text-align:center;


font-size:32px;


color:lightsalmon;


}


input{ 


border-color:#9F0251;


font-size:32px;


color:black;


padding:10px;


background-color:lightsalmon;


}


</style>


</head>


<body>


<form method="post" action="ports.php">


<p>


<label for="port">Enter TCP Port Number:</label>


<input name="port" type="number" placeholder="Min: 0, Max: 1023" min="0" max="1023" maxlength="25">


</p>


<p>


<input type="submit" name="s1" value="Go">


<input type="reset" value="Reset">


</p>


</form>


</div>





</body>


</html>
