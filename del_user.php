<?php
	include("connect_database.php");
	$sql="delete from user where id='".$_GET['userid']."'";
	mysql_query($sql);
	header("location:manage_user.php");
	exit();
?>