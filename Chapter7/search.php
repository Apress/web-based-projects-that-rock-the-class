
<!DOCTYPE html>


<!--  //////////////////////////////  -->
<!--           GET vesrion            -->
<!--  //////////////////////////////  -->



<html>
<head>
<style>
input[type=image]:disabled
{
    opacity:0.5;
}
body {
background-color:yellowgreen;
}
a {
font-size:24px;
}


table.center {
    margin-left:auto; 
    margin-right:auto;
  }

table {
    border-collapse: collapse;
   /* border: 1px solid blue; */
}

 th {
    text-align: center;
    padding: 8px;
    color: goldenrod;
    font-size:24px;
}

 td {
    text-align: left;
    padding: 8px;
    color: green;
    font-size:18px;
}

tr:nth-child(even){
background-color: lightcyan;
}

tr:hover {
background-color:silver;
}

tr.no_hover:hover {
 background-color:floralwhite;
}

/* //////////////////////////////////////////////////  */
/*  class center is used just for the second table  */
.center {
    margin-left:auto; 
    margin-right:auto;
  }

</style>
</head>


<body>
<?php


if(!empty($_GET["keywords"])){
$keywords = $_GET["keywords"];
}


// trim() spaces left right, preg_split() between
$array = preg_split('/\s+/', trim($keywords));

$cnt=0;
$items="";
foreach ($array as $item) {
    ++$cnt;
    $item = " title like '%{$item}%'";
    if ($cnt != count($array)) {
       $item="{$item} or ";   
    }  
    $items .= $item;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";


$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

////////////////////////////////////////////
// count: number results per page
$count = 5;
$offset = isset($_GET["offset"])?$_GET["offset"]:"";
$sqlquery = "select title, url from content where ".$items." limit $offset, $count ;";
///////////////////////////////////////////

if ($result = mysqli_query($mysqli, $sqlquery)) {
  echo "<table>"; 
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>";
        echo "<a href=\"".$row['url']."\">".$row['title']."</a>"; 
        echo "</td></tr>";
    }
  echo "</table>";
  mysqli_free_result($result);
}

///////////////////////////////////////////////////

$sqlquery2 = "select count(title) as c from content where ".$items." ;";

if ($result2 = mysqli_query($mysqli, $sqlquery2)) {
$row = mysqli_fetch_assoc($result2);
$c = $row['c'];
//echo $c;
//echo ceil($c/$count);
}


///////////////////////////////////////////////////
$mysqli->close();

?>


<!-- ///////////////////////////////////////////////////////// -->
<table class="center">
<tr><td>
<form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php $sub=$offset-$count; echo $sub>=0? '<input type="image" src="prev.png" border=0>'.'<input type="hidden" name="keywords" value="'.$keywords.'">'.'<input type="hidden" name="offset" value="'.$sub.'">':'<input type="image" src="prev.png" border=0 disabled>'; ?>
</form>
</td><td>
<form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php $sum=$offset+$count; echo $sum<$c? '<input type="image" src="next.png" border=0>'.'<input type="hidden" name="keywords" value="'.$keywords.'">'.'<input type="hidden" name="offset" value="'.$sum.'">':'<input type="image" src="next.png" border=0  disabled>'; ?>
</form>
</td></tr>
</table>
<!-- ////////////////////////////////////////////////////////// -->

</body>
</html>

