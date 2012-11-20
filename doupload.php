<?php
	if(isset($_POST['ok_upload']))
	{
		$site = "http://www.qhonline.info";
		$num = $_GET['file'];
		echo "<h3>Demo Images Script - Copyright by QHOnline.Info</h3>";
		// connect database
		include("connect_database.php");
		mysql_select_db("images",$conn);

		// thuc thi upload
		for($i = 0; $i < $num; $i++)
		{
			move_uploaded_file($_FILES['img']['tmp_name'][$i], "data/".$_FILES['img']['name'][$i]);
			$url = "data/".$_FILES['img']['name'][$i];
			$name = $_FILES['img']['name'][$i];
			$sql = "insert into images(img_url,img_name) value ('$url','$name')";
			mysql_query($sql);

			echo "Upload thanh cong file <b>$name</b><br />";
			echo "<img src='$url' width='120' /><br />";
			echo "Images URL: <input type='text' name='link' value='$site/$url' size='35' /><br />";
		}
		mysql_close($conn);
	}
	else
	{
		echo "Vui long chon hinh truoc khi truy cap trang nay";
	}
?>