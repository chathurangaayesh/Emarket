<?php
//Start session
session_start();

//Login-Logout  
	if(isset($_SESSION['USERID']) == TRUE) {
		echo "<a href='logout.php'>Sign Out</a>";
	}
	else{
		echo "<a href='login.php'>Sign In</a>";
	}

echo "<p><a href='viewitem.php'>View Item</a></p>";
echo "<p><a href='profile.php'>Profile</a></p>";
echo "<form action='viewitem.php' method='post'>";
?>
Item Code :<input name="itemcode" type="text" /><br />
Item Name :<input name="itemname" type="text" /><br />
Price :<input name="price" type="text" /><br />
<input name="btnadditem" type="submit" />
</form>
</body>
</html>