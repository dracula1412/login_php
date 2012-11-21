<?php
	session_start();
?>
<html>
<head>
	<title>Demo Shopping Card - Created By KMHB </title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<h1>Demo Shopping Cart</h1>
	<div id='cart'>
		<?php
		$ok = 1;
		if(isset($_SESSION['cart']))
		{
			foreach ($_SESSION['cart'] as $key => $value) {
				if(isset($value))
				{ 
					$ok = 2;
				}
			}
		}
		if($ok != 2)
		{
			echo '<p>Ban khong co mon hang nao trong gio hang</p>';
		}
		else
		{
			$item = $_SESSION['cart'];
			echo '<p>Ban dang co <a href="cart.php">'.count($item).' mon hang trong gio hang</a></p>';
		}
		?>
	</div>

	<?php
	include("connect_database.php");
	$sql = "select * from books order by id desc";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) > 0)
	{
		while ($row = mysql_fetch_array($query)) {
			echo "<div class=pro>";
			echo "<h3>$row[title]</h3>";
			echo "Tac Gia: $row[author] - Gia: ".number_format($row[price],3)." VND <br />";
			echo "<p align='right'><a href='addcart.php?item=$row[id]'>Mua sach nay</a></p>";
			echo "</div>";
		}
	}
	?>
</body>
</html>