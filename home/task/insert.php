<?php
header("Content-type:text/html;charset=utf-8");
error_reporting(0);
session_start();
include'../../public/common/config.inc.php';
$taskname=$_POST['taskname'];
$descript=$_POST['descript'];
$typeid=$_POST['typeid'];
$userid=$_SESSION['id'];
$price=$_POST['price'];
$deadtime=strtotime($_POST['deadtime']);
$pubtime=time();

$sqlacc="select * from account where accID='{$_SESSION['accID']}'";
$rstacc=mysql_query($sqlacc);
$rowacc=mysql_fetch_assoc($rstacc);
$accBalance=$rowacc['accBalance'];

$sql1="insert into task(Name,TypeID,UserID,Price,Descript,PubTime,DeadTime,Status)values('$taskname','$typeid','$userid','$price','$descript','$pubtime','$deadtime','0')";
$sql2="update account set accBalance = accBalance-{$price} where accID={$_SESSION['accID']}";

if (($accBalance - $price)>=0){
	if(mysql_query($sql1)&&mysql_query($sql2))
	{
		echo "<script>alert('成功！')</script>";
		echo "<script>location='index.php'</script>";
	}
	else
		echo "修改失败！";


}else{
	echo "<script>alert('余额不足，请充值！')</script>";
	echo "<script>location='index.php'</script>";

}


?>