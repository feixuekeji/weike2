<?php
include "../../public/common/config.inc.php";
session_start();
$username=$_POST['username'];
$password=md5($_POST['password']);
$sqlAdmin="select * from user where Username='{$username}' and Password='{$password}'";
$rstAdmin=mysql_query($sqlAdmin);
$rowAdmin=mysql_fetch_assoc($rstAdmin);

if(mysql_num_rows($rstAdmin)){
	$_SESSION['adminname']=$username;
	$_SESSION['username']=$username;
	$_SESSION['adminlogin']=1;
	$_SESSION['id']=$rowAdmin['ID'];
	$_SESSION['login']=1;

	$sqlacc="select * from account where UID='{$_SESSION['id']}'";
	$rstacc=mysql_query($sqlacc);
	$rowacc=mysql_fetch_assoc($rstacc);
	$_SESSION['accID']=$rowacc['accID'];
	
	echo "<script>location='../index.php'</script>";
}else{
	echo "<script>alert('用户名或密码错误')</script>";
	echo "<script>location='login.php'</script>";
}
?>