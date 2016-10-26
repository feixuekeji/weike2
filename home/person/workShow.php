<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
$workId=$_GET['workId'];
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
	
   <link rel="stylesheet" href="../public/css/index.css"> 
</head>
<body>
	<div class="main">
		<?php 
			include "../../public/common/header.php";
		 ?>	
	<div class="nav"></div>
	

<?php

$sqlWork="select * from work where ID={$workId}";
$rstWork=mysql_query($sqlWork);
?>
<center>

            <?php
            while ($rowWork=mysql_fetch_assoc($rstWork)){
                echo $rowWork['Descript'];   
            }
            ?>
</center>

<?php
include"../../public/common/footer.php";
?>

</div>
     
</body>
</html>