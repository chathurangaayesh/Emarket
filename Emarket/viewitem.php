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

extract($_POST);
echo "<p><a href='profile.php'>Profile</a></p>";
if($_SESSION['ROLE'] == "seller")
{
echo "<p><a href='additem.php?uid=".$_SESSION['USERID']."&role=".$_SESSION['ROLE']."'>Add item page</a></p>";
}



include("conn.php");
mysqli_select_db($conn,"emarket");
if(isset($_POST['btnaddcart'])){
	global $con;
	$sql = "insert into cart values('".$_SESSION['USERID']."','$itemcodetocart','$selleridtocart')";
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error($conn));
}

}
if($_SESSION['ROLE'] == "seller")
{	
if(isset($_POST['btnadditem'])){
$sql = "insert into item values('$itemcode','$itemname','$price','".$_SESSION['USERID']."') ";
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error($conn));
}
}
$sql = "select * from item where seller='".$_SESSION['USERID']."'";
$result=mysqli_query($conn,$sql);
    if(!$result){
die("Inavlid query".mysqli_error($conn));
}


echo "<table border='1'>
<tr>
<th>Item Code</th>
<th>Item Name</th>
<th>Price</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['itemcode'] . "</td>";
  echo "<td>" . $row['itemname'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
}
else{
$sql = "select * from item where itemcode NOT IN(select itemcode from cart)";
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error($con));
}
echo "<table border='1'>
<tr>
<th>Item Code</th>
<th>Item Name</th>
<th>Price</th>
<th>Seller</th>
<th> </th>

</tr>";

while($row = mysqli_fetch_assoc($result))
  {
  echo "<tr>";
  echo "<td>" . $row['itemcode'] . "</td>";
  echo "<td>" . $row['itemname'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['seller'] . "</td>";
   //echo "<td><input type='button' onclick='".add($_GET['uid'],$row['itemcode'],$row['seller'])."' value='ADD' /></td>";
   echo "<form action='viewitem.php' method='post'>";
   echo "<input name='itemcodetocart' value='".$row['itemcode']."' type='hidden' />";
   echo "<input name='selleridtocart' value='".$row['seller']."' type='hidden' />";
 
   echo "<td><input name='btnaddcart' type='submit' value='BUY' /></td>";
   echo "</form>";
  echo "</tr>";
  }
echo "</table>";
}



mysqli_close($conn);

?>


