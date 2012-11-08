
<?php
session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] == 2)
{
 if(isset($_POST['adduser']))
 {
$u = $p ="";
  if($_POST['username'] == NULL)
  {
   echo "Vui long nhap username<br />";
  }
  else
  {
   $u=$_POST['username'];
  }
  if($_POST['password'] != $_POST['re-password'])
  {
   echo "Password va re-password khong chinh xac<br />";
  }
  else
  {
   if($_POST['password'] == NULL)
   {
    echo "Vui long nhap password<br />";
   }
   else
   {
    $p=$_POST['password'];
   }
  }
  $l=$_POST['level'];
  if($u & $p & $l)
  {
   $conn=mysql_connect("localhost","admin","n0") or die("can't connect this database");
   mysql_select_db("project",$conn);
   $sql="select * from user where username='".$u."'";
   $query=mysql_query($sql);
   if(mysql_num_rows($query) != "" )
   {
    echo "Username nay da ton tai roi<br />";
   }
   else
   {
    $sql2="insert into user(username,password,level) values('".$u."','".$p."','".$l."')";
    $query2=mysql_query($sql2);
    echo "Da them thanh vien moi thanh cong";
   }
  }
 }
}
?>
<form action='add_user.php' method='POST'>
Level: <select name='level'>
<option value='1'>Member</option>
<option value='2'>Admin </option>
</select><br />
Username: <input type='text' name='username' size='25' /><br />
Password: <input type='password' name='password' size='25' /> <br />
Re-Password: <input type='password' name='re-password' size='25' /><br />
<input type='submit' name='adduser' value='Add New User' />
</form>
<?php
if( $_SESSION['level'] != 2 || !isset($_SESSION['userid']) )
{
 header("location: login.php");
 exit();
}
?>
