<?php
session_start(); 
$user=$_SESSION['session_user'];
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
background-color:brown;
}
.right {
    margin: auto;
    width: 100%;
    border: none;
    padding-right: 20px;
    text-align:right;
    background-color:lightsalmon;
    font-size:24px;
}
table{
background-color:lightsalmon;
color:black;
font-size:24px;
width:70%;
margin: 0 auto;
padding:20px;
}
td{
text-align:center;
}
h1{
text-align:center;
}
</style>
</head>

<body>


<p class="right">
You are currently logged in as user <?php echo $user ?> 
<a href="logout.php">Logout</a>
</p>
<br><br><br>
<h1>Books Loaned</h1>

<?php

display_books($user);

function display_books($user) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
$sql = "SELECT book_loan.book_id, book_loan.loan_date FROM user INNER JOIN book_loan ON user.id = book_loan.user_id WHERE user.username='$user'";
if($result=mysqli_query($mysqli, $sql)){
  if (mysqli_num_rows($result)>=1){
    echo "<table>";
    echo "<tr><td>". '<b>ISBN</b>' . "</td><td>" . '<b>Loan Date</b>' . "</td><td>" . '<b>Due Date</b>' . "</td></tr>";
    while ($row=mysqli_fetch_assoc($result))
      {
        $date1 = strtotime($row['loan_date']);
        $newformat1 = date('l, j F Y', $date1);
        $date2 = strtotime("+ 21 days", $date1);
        $newformat2 = date('l, j F Y',$date2);
        echo "<tr><td>". $row['book_id'] . "</td><td>" . $newformat1 . "</td><td>" . $newformat2 . "</td></tr>";
      }
    echo "</table>";
    mysqli_free_result($result);
  } else{
    echo "<h1>No results found</h1>";
  }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
$mysqli->close();

}
}
?>

</body>
</html>
