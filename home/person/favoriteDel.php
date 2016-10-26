<?php
header('content-type:text/html;charset=utf-8');
error_reporting(0);
include "../../public/common/config.inc.php";
$favId=$_GET['favId'];
$sql="delete from favorite where fav_id={$favId}";
if(mysql_query($sql)){
	echo "<script>alert('删除成功！')</script>";
	echo "<script>location='favoriteList.php'</script>";
}
else{
	echo "<script>alert('删除失败！！！')</script>";
	echo "<script>location='favoriteList.php'</script>";
}


?>