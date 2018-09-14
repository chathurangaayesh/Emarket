<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("conn.php");
$result=mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS emarket");
if(!$result){
die("Inavlid query".mysqli_error());
}
mysqli_select_db($conn,"emarket");
$sql1 = "CREATE TABLE IF NOT EXISTS user(user_id int AUTO_INCREMENT PRIMARY KEY,username varchar(20),password varchar(80),role varchar(20))";
$result1=mysqli_query($conn,$sql1);
if(!$result1){
die("Inavlid query".mysqli_error());
}
$sql2 = "CREATE TABLE IF NOT EXISTS item(itemcode varchar(10),itemname varchar(20),price real,seller int)";
$result2=mysqli_query($conn,$sql2);
if(!$result2){
die("Inavlid query".mysqli_error());
}
$sql3 = "CREATE TABLE IF NOT EXISTS cart(buyer_id int,itemcode varchar(10),seller_id int)";
$result3=mysqli_query($conn,$sql3);
if(!$result3){
die("Inavlid query".mysqli_error());
}
mysqli_close($conn);

?>
</body>
</html>