<?php
session_start();
$id = $_GET['item'];
if(isset($_SESSION['cart'][$id]))
{
	$qty = $_SESSION['cart'][$id] + 1;
}
else
{
	$qty = 1;
}
$_SESSION['cart'][$id] = $qty;
#echo $_SESSION['cart'][$id];
header("location:cart.php");
exit();
?>