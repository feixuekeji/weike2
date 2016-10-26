<?php
//error_reporting(0);
header('content-type:text/html;charset=utf-8');
include "../../public/common/config.inc.php";
$id=$_POST['refundId'];
$userId=$_POST['userId'];
$status=$_POST['status'];
$taskId=$_POST['taskId'];


$sqlprice="select * from task where ID = {$taskId}";
$rstprice=mysql_query($sqlprice);
$rowprice=mysql_fetch_assoc($rstprice);
$price=$rowprice['Price'];

$sql1="update account set accBalance=accBalance+{$price}*1.1 where UID={$userId}";
$sql2="update refund set refund_status='{$status}' where refund_id={$id}";

$check="select * from refund where refund_id='{$id}' and refund_status!='0'";
$rstUser=mysql_query($check);

if(!mysql_num_rows($rstUser)){
	if ($status==1) {

	if(mysql_query($sql1)&&mysql_query($sql2))
	{
		echo "<script>alert('成功！')</script>";
		
	}

	
}else
if(mysql_query($sql2))
	{
		echo "<script>alert('成功！')</script>";
		
	}
	
}else{
	echo "<script>alert('已经审核过了！')</script>";
	
}
echo "<script>location='refundList.php'</script>";


?>