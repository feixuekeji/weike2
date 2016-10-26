<?php
error_reporting(0);
session_start();
$userId=$_SESSION['id'];
include "../../public/common/config.inc.php";
$time=time();

$sqlUser="select * from task where UserID = {$userId} and Status = '3' and DeadTime < {$time} order by ID desc";
$rstUser=mysql_query($sqlUser);
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<link rel="stylesheet" href="../../css/base.css">
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/mCustomScrollbar.css">
<script src="../../js/jquery.min.js"></script>
<script src="../../js/addclear.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".m_search_input").addClear();
	$(".m_search_input").focus();
});
</script>
<style>
body,html{height:100%}
</style>
</head>

<body>
<!-- 学生管理 -->
<div class="xsd w1020" style="height:100%;">
	<div class="title-bar">
		<span class="txt"></span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-300">任务名</span>
						<span class="col-50">佣金</span>
						<span class="col-4">截止时间</span>
						<span class="col-50">状态</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-230'><a href='../task/task.php?id={$rowUser['ID']}'>{$rowUser['Name']}</a></span>";
				echo "<span class='col-50'>{$rowUser['Price']}</span>";
				echo "<span class='col-4'>".date('Y-m-d H:i',$rowUser['DeadTime'])."</span>";
				switch($rowUser['Status'])
				{
				case 0:
				echo "<span class='col-50'>未领取</span>";
				break;
				case 1:
				echo "<span class='col-50'>进行中</span>";
				break;
				case 2:
				echo "<span class='col-50'>已完成</span>";
				break;
				case 3:
				echo "<span class='col-50'>未完成</span>";
				break;
				}
				echo "<span class='col-12'><a href='refundSub.php?taskId={$rowUser['ID']}'> 申请退款</a></span>";
				echo "</p>";
				echo "</li>";
				echo "</ul>";
			}
			?>


		
			
		</div>
	</div>
</div>
</body>
</html>