<?php
header('content-type:text/html;charset=utf-8');
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
$workId=$_GET['workId'];
$sql="delete from work where ID={$workId}";
if(mysql_query($sql)){
	echo "<script>alert('删除成功！')</script>";
	echo "<script>location='work.php'</script>";
}
else{
	echo "<script>alert('删除失败！！！')</script>";
	echo "<script>location='work.php'</script>";
}


?>