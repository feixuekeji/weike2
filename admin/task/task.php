<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
$id=$_GET['taskId'];
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
	
   <link rel="stylesheet" href="../../home/public/css/index.css"> 
</head>
<body>
	<div class="main">
		<?php 
			include "../../public/common/header.php";
		 ?>	
	<div class="nav"></div>
	<div class="title">
	<?php echo $rowUser['Name'] ?>
    </div>
		
		<div class="nav"></div>
		<div class="descriptl">
        <div class="descriptl_left">
        <p>
       	任务编号:<?php echo $rowUser['ID'] ?> </p>
		<p>任务类型：<?php echo $rowUser['TypeID'] ?></p>
            <p>任务金额: <span style="font-size: 24px; color: #FF0004;"><?php echo $rowUser['Price'] ?>元       </span></p>
        </div>

            <div class="descriptl_right">
            <p>
            	发布用户：
            	<?php echo $rowUser['Username'] ?>
            </p>
            <p>
                <a href='../message/message.php?acceptName=<?php echo $rowUser['Username'] ?>'>发站内信</a>
            </p>
            <p>
            	开始时间：
            	<?php echo date('Y-m-d',$rowUser['PubTime']) ?>
            </p>
            <p>
            	截止时间：
            	<?php echo date('Y-m-d',$rowUser['DeadTime']) ?>
            </p>
            <p>
            	任务状态：
            	<?php echo $rowUser['Status'] ?>
            </p>
            </div>
            

		</div>


		<div class="nav"></div>
            
<div class="descript">

	<h2>任务详情:</h2>

<?php echo $rowUser['Descript'] ?>  
</div>
<div class="nav"></div>
<div class="task_submit">

<div class="nav"></div>

<?php
include"../../public/common/footer.php";
?>

</div>
     
</body>
</html>