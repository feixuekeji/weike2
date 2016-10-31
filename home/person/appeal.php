<?php
header("Content-type:text/html;charset=utf-8");
include '../login/acl.inc.php';
include'../../public/common/config.inc.php';
$taskId=$_GET['taskId'];
$workId=$_GET['workId'];
$Reason=$_REQUEST['Reason'];
$appealTime=time();
$sqlappeal="select * from appeal where work_id='{$workId}'";
$rstappeal=mysql_query($sqlappeal);

$sql="insert into appeal(task_id,work_id,appeal_time,Reason)values('$taskId','$workId','$appealTime','$Reason')";
if(!mysql_num_rows($rstappeal)){
	if(mysql_query($sql))
	{
		echo "申诉成功！";
	}
	else{
		echo "申诉失败！";
		}
		
}else{
	echo "已经申诉过了！";
	
}


?>