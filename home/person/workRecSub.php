<?php
error_reporting(0);
header('content-type:text/html;charset=utf-8');
include "../../public/common/config.inc.php";
$id=$_REQUEST['workid'];
$status=$_REQUEST['status'];
$Reason=$_REQUEST['Reason'];
//获取TaskID
$sqltaskid="select * from work where ID = {$id}";
$rstsqltaskid=mysql_query($sqltaskid);
$rowtaskid=mysql_fetch_assoc($rstsqltaskid);
$taskid=$rowtaskid['TaskID'];
$accUid=$rowtaskid['UserID'];
//获取price
$sqlprice="select * from task where ID = {$taskid}";
$rstprice=mysql_query($sqlprice);
$rowprice=mysql_fetch_assoc($rstprice);
$price=$rowprice['Price'];
$taskStatus=$status+1;


$sql1="update work set Status='{$status}',Reason='{$Reason}' where ID={$id}";
$sql2="update account set accBalance=accBalance+{$price}*1.1 where UID={$accUid}";
$sql3="update task set Status='{$taskStatus}' where ID={$taskid}";
if ($status==1) {
	if(mysql_query($sql1)&&mysql_query($sql2)&&mysql_query($sql3))
	{
		//return true;
		echo "确认合格";
		
		//echo "<script>location='workrec.php'</script>";
	}
	else
		return false;
		//echo "修改失败！<a href='workrec.php'> 返回</a>";
	# code...
}else
{
	if(mysql_query($sql1)&&mysql_query($sql3))
	{
		echo "确认不合格";
		
	}
	

}
	



?>