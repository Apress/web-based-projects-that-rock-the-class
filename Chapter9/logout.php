
<?php
session_start();
setcookie(session_name(), '', 100);
unset($_SESSION['session_user']);
session_destroy();
header('Location: login.php');
exit;
?>
