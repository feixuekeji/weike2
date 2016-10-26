<?php
header("Content-type:text/html;charset=utf-8");
include '../login/acl.inc.php';
include'../../public/common/config.inc.php';
$taskId=$_GET['taskId'];
$refundTime=time();
$sqlrefund="select * from refund where task_id='{$taskId}'";
$rstrefund=mysql_query($sqlrefund);

$sql="insert into refund(task_id,refund_time)values('$taskId','$refundTime')";
if(!mysql_num_rows($rstrefund)){
	if(mysql_query($sql))
	{
		echo "<script>alert('申请成功！')</script>";
	}
	else{
		echo "<script>alert('申请失败！')</script>";
		}
		
}else{
	echo "<script>alert('已经申请过了！')</script>";
	
}
echo "<script>location='refund.php'</script>";

?>