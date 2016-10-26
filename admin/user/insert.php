<?php
header("Content-type:text/html;charset=utf-8");
error_reporting(0);
include'../../public/common/config.inc.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$repassword=md5($_POST['repassword']);
$email=$_POST['email'];
$admin=$_POST['admin'];

$regtime=time();

$sql="insert into user(Username,Password,Regtime,Email,admin)values('$username','$password','$regtime','$email','$admin')";


if($password===$repassword)
{
	if(mysql_query($sql))
	{
		//echo "<script>alert('添加成功！')</script>";
		echo "<script>location='add.php'</script>";
	}
	else
		echo "添加失败！<a href='add.php'> 返回</a>";

}
else
echo "两次密码不一致，请重新输入！<a href='add.php'> 返回</a>"


?>