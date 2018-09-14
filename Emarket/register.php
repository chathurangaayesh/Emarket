<?php
extract($_POST);

if(isset($_POST['btnregister'])){


include("conn.php");
mysqli_select_db($conn,"emarket");

$sql = "insert into user(username,password,role) values('$uname','".md5($pass)."','$role')";
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error($conn));
}
mysqli_close($conn);

 header("Location: login.php");
 }  
?>
<form action="" method="post">
Username :<input name="uname" type="text" /><br />
Password :<input name="pass" type="password" /><br />
Role :<select name="role">
<option value="seller">seller</option>
<option value="buyer">buyer</option>
</select><br>
<input name="btnregister" type="submit" />
<input type="reset" value="clear" />
</form>
