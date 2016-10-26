<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include '../login/acl.inc.php';
include'../../public/common/config.inc.php';
$taskId=$_GET['taskId'];
$userId=$_SESSION['id'];
//获取余额
$sqlacc="select * from account where accID='{$_SESSION['accID']}'";
$rstacc=mysql_query($sqlacc);
$rowacc=mysql_fetch_assoc($rstacc);
$accBalance=$rowacc['accBalance'];
//获取佣金
$sqlUser="select * from task where ID={$taskId}";
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
$Price=$rowUser['Price'];

$sql1="update task set bidder='{$userId}',Status='1' where ID={$taskId}";
$sql2="update account set accBalance = accBalance-0.1*{$Price} where accID={$_SESSION['accID']}";
//接任务扣取保证金
if ($rowUser['bidder']!=0) {
	echo "<script>alert('该任务已被领取')</script>";
	 echo "<script>location='task.php?id={$taskId}'</script>";
}else
if (($accBalance - $Price*0.1)>=0) {

	if(mysql_query($sql1)&&mysql_query($sql2))
	{
		echo "<script>alert('成功！')</script>";
		echo "<script>location='task.php?id={$taskId}'</script>";
	}
	else
		echo "修改失败！";
	# code...
}else{
		echo "<script>alert('账户余额不足以支付保证金！')</script>";
	    echo "<script>location='task.php?id={$taskId}'</script>";
	}

?>