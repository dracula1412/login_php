<form action="upload.php" method="post">
	Enter your Image: <input type="text" name="txtnum" value="<?php echo $_POST['txtnum']; ?>" size="10" />
	<input type="submit" name="ok_num" value="Accept" />
</form>

<?php
	if(isset($_POST['txtnum']))
	{
		$num = $_POST['txtnum'];
		echo "<hr />";
		echo "Ban dang chon $num file upload<br />";
		echo "<form action='doupload.php?file=$num' method='post' enctype='multipart/form-data'>";
		for($i=1;$i <= $num; $i++)
		{
			echo "<input type='file' name='img[]' /><br />";
		}
		echo "<input type='submit' name='ok_upload' value='Upload' />";
		echo "</form>";
	}
?>