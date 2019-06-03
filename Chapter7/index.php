<!DOCTYPE html>
<html>
<head>
<style>
body{
background-color:greenyellow;
}
.center {
    margin: auto;
    width: 80%;
    border: 3px solid #74AD23;
    padding: 10px;
}
p{
text-align:center;
font-size:32px;
color:green;
font-weight:bold;
}
input{
border-color:#74AD23;
font-size:32px;
color:green;
padding:10px;
background-color:greenyellow;
}
</style>
</head>
<body>
<br><br><br><br><br><br>
<div class="center">
<form name="form1" method="get" action="search.php">
  <p>Search the Papers: 
     <input type="text" name="keywords">&nbsp;
     <input type="submit" value="Go">
 </p>
<!-- ////////////////////////////////////// -->


<input type="hidden" name="offset" value="0">

<!-- ////////////////////////////////////// -->
</form>
</div>
</body>
</html>
