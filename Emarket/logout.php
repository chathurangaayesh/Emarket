<?php
//Start session
session_start();

//Unset the variable SESS_MEMBER_ID stored in session
session_destroy();
//echo "logout";
header("Location: login.php");
?>
