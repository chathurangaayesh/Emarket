<html>
<body>
<?php
if(isset($_GET['error'])){
echo "Enter valid username/password";
}
?>
<form action="authentication.php" method="post">
Username :<input name="uname" type="text" /><br />
Password :<input name="pass" type="password" /><br />
<input name="btnlogin" type="submit"  value="Login"/>
<input type="reset" value="clear" />
</form>
If you are a new user create a account from <a href="register.php">here</a>
</body>
</html>