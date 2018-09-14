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

//extract($_GET);
echo "<p><a href='viewitem.php'>View Item</a></p>";
include("conn.php");
mysqli_select_db($conn,"emarket");
if($_SESSION['ROLE'] == "seller")
{
$sql = "select buyer_id,itemcode from cart where seller_id=".$_SESSION['USERID'];
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysqli_error($conn)); 
}
echo "<table border='1'>
<tr>
<th>Buyer ID</th>
<th>Item Code</th>
</tr>";
while($row = mysqli_fetch_assoc($result))
{
  echo "<tr>";
  echo "<td>" . $row['buyer_id'] . "</td>";
  echo "<td>" . $row['itemcode'] . "</td>";
  echo "</tr>";
}
echo "</table>";
}
if($_SESSION['ROLE'] == "buyer")
{
$sql = "select seller_id,itemcode from cart where buyer_id=".$_SESSION['USERID'];
$result=mysqli_query($conn,$sql);
if(!$result){
die("Inavlid query".mysql_error($conn)); 
}
echo "<table border='1'>
<tr>
<th>Seller ID</th>
<th>Item Code</th>
</tr>";
while($row = mysqli_fetch_assoc($result))
{
  echo "<tr>";
  echo "<td>" . $row['seller_id'] . "</td>";
  echo "<td>" . $row['itemcode'] . "</td>";
  echo "</tr>";
}
echo "</table>";

}
?>

