<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

include("conn.php");
mysqli_select_db($conn,"emarket");
$passbuyer=md5("buyer123");
$passseller=md5("seller123");
$sql = "insert into user(username,password,role) values('buyer','$passbuyer','buyer'),('seller','$passseller','seller') ";
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error());
}
mysqli_close($conn);
?>
</body>
</html>