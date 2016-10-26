<?php
header("Content-type:text/html;charset=utf-8");
include'../../public/common/config.inc.php';
$id=$_GET['id'];
$accID=$_GET['accID'];
$amount=$_GET['amount'];
$sql1="update topup set topUpStatus='1' where topUpID={$id}";
$sql2="update account set accBalance=accBalance+{$amount} where accID={$accID}";

	if(mysql_query($sql1)&&mysql_query($sql2))
	{
		echo "<script>alert('修改成功！')</script>";
		
	}
	else
		echo "修改失败！";
	echo "<script>location='topUPlist.php'</script>";



?>