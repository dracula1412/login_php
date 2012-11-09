<?php
	$tg = time();
	$tgout = 6000;
	$tgnew = $tg - $tgout;
	include("connect_database.php");
	$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
	$PHP_SELF = $_SERVER['PHP_SELF'];
	$sql = "insert into useronline(tgtmp,ip,local) values ('$tg','$REMOTE_ADDR','$PHP_SELF')";
	$query = mysql_query($sql);
	#echo $sql;

	$sql = "delete from useronline where tgtmp < $tgnew";
	$query = mysql_query($sql);

	$sql = "select distinct ip from useronline where local='$PHP_SELF'";
	#$sql = "select * from user";
	$query = mysql_query($sql);
	$user = mysql_num_rows($query);
	echo "user online: $user" ;
?>