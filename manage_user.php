<?php
	session_start();
	if(isset($_SESSION['userid']) && $_SESSION['level'] == 2)
	{
?>
<table align='center' width='400' border='1'>
	<tr>
		<td>STT</td>
		<td>Username</td>
		<td>Level</td>
		<td>Edit</td>					
		<td>Delete</td>			
	</tr>
<?php
		$conn=mysql_connect("localhost","admin","n0") or die ("can't connect database");
		mysql_select_db("project",$conn);
		$sql="select * from user order by id DESC";
		$query=mysql_query($sql);
		if(mysql_num_rows($query) == "")
		{
			echo "<tr><td colspan=5 align=center>Chua co user nao</td></tr>";
		}
		else
		{
			$stt=0;
			while($row=mysql_fetch_array($query))
			{
				$stt++;
				echo "<tr>";
				echo "<td>$stt</td>";
				echo "<td>".$row['username']."</td>";
				if($row['level'] == "1")
				{
					echo "<td>Member</td>";
				}
				else
				{
					echo "<td>Admin</td>";
				}
				echo "<td><a href='edit_user.php?userid=$row[id]'>Edit</a></td>";
				echo "<td><a href='del_user.php?userid=$row[id]'>Delete</a></td>";
				echo "</tr>";
			}
		}
	}
?>
</table>
<?
	if( !isset($_SESSION['userid']) || $_SESSION['level'] != 2)
	{
		header("location: login.php");
		exit();
	}
?>