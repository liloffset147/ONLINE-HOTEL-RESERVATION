<?php
session_start();
unset($_SESSION['admin_id']); // Unset the specific session variable
header("location: index.php");
exit(); // Ensure no further code is executed after redirection
?>