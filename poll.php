<?php
	include("connect_database.php");

	$sql = "select * from question order by qid desc";
	$query = mysql_query($sql);

	if(mysql_num_rows($query) > 0)
	{
		$row = mysql_fetch_array($query);
		$qid = $row['qid'];
		echo "<form action='poll.php?questionid=$qid' method='post' >";
		echo "<h2>$row[qtitle]</h2>";

		$sql2 = "select * from answer where qid='$qid' order by aid";
		$query2 = mysql_query($sql2);
		if(mysql_num_rows($query2) > 0)
		{
			while($row2 = mysql_fetch_array($query2)){
				echo "<input type=radio name=answer value=$row2[aid]>$row2[atitle]<br />";
			}
		}
		echo "<input type='submit' name='ok' value='Binh chon'>";
		echo "<a href='result.php?questionid=$qid'>Xem ket qua</a>";
		echo "</form>";
	}

	if(isset($_POST['ok']))
	{
		$id = $_POST['answer'];
		$qid = $_GET['questionid'];
		$sql3 = "update answer set acount=acount+1 where aid='".$id."'";
		mysql_query($sql3);
		header("location: result.php?questionid=$qid");
		exit();
	}
?>