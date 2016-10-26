<?php
//error_reporting(0);
header('content-type:text/html;charset=utf-8');
include "../../public/common/config.inc.php";
$id=$_REQUEST['appealId'];
$userId=$_REQUEST['userId'];
$bidderId=$_REQUEST['bidderId'];
$status=$_REQUEST['status'];
$taskId=$_REQUEST['taskId'];


$sqlprice="select * from task where ID = {$taskId}";
$rstprice=mysql_query($sqlprice);
$rowprice=mysql_fetch_assoc($rstprice);
$price=$rowprice['Price'];

$sql1="update account set accBalance=accBalance+{$price}*1.1 where UID={$bidderId}";
$sql2="update appeal set appeal_status='{$status}' where appeal_id={$id}";

$check="select * from appeal where appeal_id='{$id}' and appeal_status!='0'";
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
echo "<script>location='appealList.php'</script>";


?>