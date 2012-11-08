<?php
if(isset($_POST['ok']))
{
$u=$p="";
 if($_POST['username'] == NULL)
 {
  echo "Please enter your username<br />";
  include("form_login.php");
 }
 else
 {
  $u=$_POST['username'];
 }
 if($_POST['password'] == NULL)
 {
  echo "Please enter your password<br />";
  include("form_login.php");
 }
 else
 {
 $p=$_POST['password'];
 }

 if($u && $p)
 {
 	$conn=mysql_connect("localhost","admin","n0") or die("can't connect this database");
	mysql_select_db("project",$conn);

	$sql="select * from user where username='".$u."' and password='".$p."'";
	$query=mysql_query($sql);
	if(mysql_num_rows($query) == 0)
	{
		echo "Username of password is not correct, please try again.";
		include("form_login.php");
	}
	else
	{
		$row=mysql_fetch_array($query);
		session_start();
		$_SESSION['userid'] = $row[id];
		$_SESSION['level'] = $row[level];
		include("add_user.php");
		#echo "congratulation! unbelievable!";
	}
 }
}
else
{
	include("form_login.php");
}
?>

