<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include'../../public/common/config.inc.php';
$acceptName=$_POST['acceptName'];
$sqlUser="select ID from user where Username='{$acceptName}'";
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
$acceptid=$rowUser['ID'];
$descript=$_POST['descript'];
$sendid=$_SESSION['id'];
$pubtime=time();


$sql="insert into message(SendID,AcceptID,Message,PubTime)values('$sendid','$acceptid','$descript','$pubtime')";

	if(mysql_query($sql))
	{
	    $id=mysql_insert_id();
		echo "<script>alert('发送成功！')</script>";
	}
	else
		echo "添加失败！";


?>