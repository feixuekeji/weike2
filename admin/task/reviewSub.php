<?php
header("Content-type:text/html;charset=utf-8");
error_reporting(0);
include'../../public/common/config.inc.php';
$taskId=$_REQUEST['taskId'];
$review=$_REQUEST['review'];
$sql="update task set review='{$review}' where ID={$taskId}";
$check="select * from task where ID='{$taskId}' and review!='0'";
$rstUser=mysql_query($check);

if(!mysql_num_rows($rstUser)){
	if(mysql_query($sql))
	{
		echo "<script>alert('成功！')</script>";
		
	}
}else
echo "<script>alert('已经审核过了！')</script>";
echo "<script>location='review.php'</script>";



?>