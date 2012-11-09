<?php
	session_start();
	if(isset($_POST['ok']))
	{
		if($_POST['txtCaptcha'] == NULL)
		{
			echo "Please enter your code";
		}
		else
		{
			if($_POST['txtCaptcha'] == $_SESSION['security_code'])
			{
				echo "Ma hop le";
			}
			else
			{
				echo "Ma khong dung";
			}
		}
	}
?>

<form action="form.php" method=post>
	<table>
		<tr>
			<td align="left">
				<label for="captcha">Captcha</label>
			</td>
			<td>
				<input type="text" name="txtCaptcha" maxlength="10" size="32" />
			</td>
			<td>
				<img src="random_image.php">
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type=submit name=ok value="Check" />
			</td>
		</tr>
	</table>
</form>