<?php
session_start();
include("conn.php");
mysqli_select_db($conn,"emarket");
extract($_POST);
if($_POST['btnlogin']){

$sql = "select user_id,role from user where username='".$uname."' and 
password='".md5($pass)."' ";
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error($conn)); 
}
$row = mysqli_fetch_assoc($result);

$_SESSION['ROLE'] = $row['role'];
$_SESSION['USERID'] = $row['user_id'];
if($row['role'] == "buyer"){
  header("Location: viewitem.php");
  
}
elseif($row['role'] == "seller"){
	header("Location: additem.php");
	 
}
else{
  header("Location: login.php?error=1");  
}
mysql_close($con);
}
?>
