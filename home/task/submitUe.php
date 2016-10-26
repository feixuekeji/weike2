<?php
$taskid=$_GET['taskid']
?>
<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
$id=$_GET['id'];
$userId = $_SESSION['id'];
$sqlUser="select task.*,user.Username from task,user where task.ID={$id} and task.UserID=user.ID";
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>任务详情</title>	
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.all.min.js"> </script>
	<link type="text/css" rel="stylesheet" href="../../public/ueditor/third-party/video-js/video-js.css"/>
<script language="javascript" type="text/javascript" src="../../public/ueditor/third-party/video-js/video.js"></script>

<body>
<?php 
            include "../../public/common/header.php";
         ?> 

<div class="task_submit">

<center>
<h1>提交作品</h1>
<form action="sumbit.php" method="post">
<script type="text/plain" id="editor" name="descript"></script>
      <script type="text/javascript">
        var ue = UE.getEditor('editor',{
        initialFrameWidth: 1000,
        initialFrameHeight: 500
        });
    </script>
    <input type="hidden" name='taskid' value='<?php echo $taskid ?>'>   
        <td align='center'><input class="btn1" type="submit" value="确认交稿"></td>

 
</form>
</center>
</div>   
</body>
</html>


