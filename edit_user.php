<?php
	include("connect_database.php");
	$id=$_GET['userid'];
	if(isset($_POST['ok']))
	{
		if($_POST['user'] == NULL)
			{echo "Please enter your name";}
		else
			{$u=$_POST['user'];}
		if($_POST['pass'] != $_POST['repass'])
			{echo "Password and Re-password is not correct";}
		else
		{
			if($_POST['pass'] != NULL)
				{$p=$_POST['pass'];}
		}
		$l = $_POST['level'];
		if($u && $p && $l)
		{
			$sql="update user set username='".$u."', password='".$p."', level='".$l."' where id='".$id."'";
			mysql_query($sql);
			header("location:manage_user.php");
			exit();
		}
		else
		{
			if($u && $l)
			{
				$sql="update user set username='".$u."', level='".$l."' where id='".$id."'";
				mysql_query($sql);
				header("location:manage_user.php");
				exit();
			}
		}
	}

	$sql="select * from user where id='".$id."'";
	$query=mysql_query($sql);
	$row=mysql_fetch_array($query);
?>

<form action="edit_user.php?userid=<?=$id?>" method=post>
	Level: 
	<select name=level>
		<option value=1 <? if($row['level'] == 1) echo "selected"; ?>) >Member</option>
		<option value=2 <? if($row['level'] == 2) echo "selected"; ?>>Administrator</option>
	</select><br />
	Username: <input type=text name=user size=20 value="<?=$row['username']?>" /><br />
	Password: <input type=password name=pass size=20 /> <br />
	Re-password: <input type=password name=repass size=20 /><br />
	<input type=submit name=ok value="Edit User" />
</form>

