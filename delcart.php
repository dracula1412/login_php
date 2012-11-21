<?php
session_start();
$id = $_GET['productid'];
if ($id == 0)
{
	unset ($_SESSION['cart']);
}
else
{
	unset ($_SESSION['cart'][$id]);
}
header("location:cart.php");
exit();
?>