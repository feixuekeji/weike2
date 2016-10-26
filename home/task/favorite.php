<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include '../login/acl.inc.php';
include'../../public/common/config.inc.php';
$taskId=$_GET['taskId'];
$userId=$_SESSION['id'];
$favTime=time();

$check="select * from favorite where UserID='{$userId}' and TaskID='{$taskId}'";
$rstUser=mysql_query($check);
$sql="insert into favorite(TaskID,UserID,fav_time)values('$taskId','$userId','$favTime')";
if(!mysql_num_rows($rstUser)){
	if(mysql_query($sql))
	{
		echo "<script>alert('收藏成功！')</script>";
	    echo "<script>location='task.php?id={$taskId}'</script>";
	}
	else
		echo "<script>location='task.php?id={$taskId}'</script>";
}else{
	echo "<script>alert('已经收藏过了！')</script>";
	echo "<script>location='task.php?id={$taskId}'</script>";
}
?>