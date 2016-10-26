<?php
header("Content-type:text/html;charset=utf-8");
include '../login/acl.inc.php';
include'../../public/common/config.inc.php';
$taskId=$_GET['taskId'];
$workId=$_GET['workId'];
$appealTime=time();
$sqlappeal="select * from appeal where work_id='{$workId}'";
$rstappeal=mysql_query($sqlappeal);

$sql="insert into appeal(task_id,work_id,appeal_time)values('$taskId','$workId','$appealTime')";
if(!mysql_num_rows($rstappeal)){
	if(mysql_query($sql))
	{
		echo "<script>alert('申诉成功！')</script>";
	}
	else{
		echo "<script>alert('申诉失败！')</script>";
		}
		
}else{
	echo "<script>alert('已经申诉过了！')</script>";
	
}
echo "<script>location='work.php'</script>";

?>