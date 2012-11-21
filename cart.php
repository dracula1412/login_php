<html>
<head>
	<title>Demo Shopping Card - Created By KMHB </title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
session_start();
if(isset($_POST['submit']))
{
	foreach ($_POST['qty'] as $key => $value) {
		if(($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif (($value > 0) and (is_numeric($value))) {
			$_SESSION['cart'][$key] = $value;
		}
	}
	header("location:cart.php");
}
echo "<form action='cart.php' method='post'>";
foreach ($_SESSION['cart'] as $key => $value) {
	$item[] = $key;
}
$str = implode(",", $item);
include("connect_database.php");
$sql = "select * from books where id in ($str)";
$querry = mysql_query($sql);
while ($row = mysql_fetch_array($querry)) {
	echo "<div class='pro'>";
	echo "<h3>$row[title]</h3>";
	echo "Tac gia: $row[author] - Gia: ".number_format($row[price],3)." VND<br />";
	echo "<p align='right'>So Luong: <input type='text' name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row[id]]}'> - ";
	echo "<a href='delcart.php?productid=$row[id]'>Xoa sach nay.</a></p>";
	echo "<p align='right'>Gia tien mon hang: ".number_format($_SESSION['cart'][$row[id]]*$row[price],3)." VND</p>";
	echo "</div>";
	$total += $_SESSION['cart'][$row[id]] * $row[price];
}

echo "<div class='pro' align='right'>";
echo "<b>Tong tien cho cac mon hang: <font color='red'>".number_format($total,3)." VND</font></b>";
echo "</div>";
if(isset($_SESSION['cart']))
{
	echo "<input type='submit' name='submit' value='Cap nhat gio hang' />";
	echo "<div class='pro' align='center'>";
	echo "<b><a href='index.php'>Mua sach tiep</a> - <a href='delcart.php?productid=0'>Xoa bo gio hang</a></b>";
	echo "</div>";
}
else
{	
	echo "<div class=pro align='center'>";
	echo "<p>Ban khong co mon hang nao trong gio hang</p>";
	echo "<b><a href='index.php'>Mua sach tiep</a></b>";
	echo "</div>";
}
?>
</body>
</html>