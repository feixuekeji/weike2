<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include '../login/acl.inc.php';
include'../../public/common/config.inc.php';
$taskid=$_POST['taskid'];
$descript=$_POST['descript'];
$userid=$_SESSION['id'];
$pubtime=time();

$check="select * from work where UserID='{$userid}' and TaskID='{$taskid}'";
$rstUser=mysql_query($check);

$sql="insert into work(TaskID,UserID,Descript,PubTime,Status)values('$taskid','$userid','$descript','$pubtime','0')";

if(!mysql_num_rows($rstUser)){

	if(mysql_query($sql))
	{
		echo "<script>alert('提交成功！')</script>";
	    echo "<script>location='task.php?id={$taskid}'</script>";
	}
	else
		echo "添加失败！<a href='task.php?id={$taskid}'> 返回</a>";

}else{
	echo "<script>alert('您已经提交过了！')</script>";
	echo "<script>location='task.php?id={$taskid}'</script>";
}
	


?>