<?php
error_reporting(0);
session_start();
$id=$_SESSION['id'];
include "../../public/common/config.inc.php";

//获取数据列数，实现翻页
$total=$rowCnt[0];
$sqlCnt="select count(*) from work where UserID={$id}";
$rstCnt=mysql_query($sqlCnt);
$rowCnt=mysql_fetch_row($rstCnt);
$total=$rowCnt[0];

$length=$_GET['length']?$_GET['length']:5;
$page=$_GET['page']?$_GET['page']:1;
$off=($page-1)*$length;
$totpage=ceil($total/$length);
$prepage=$page-1;
if($total>=$page)
	$nextpage=$page+1;
else
	$nextpage=$totpage;

$sqlUser="select work.TaskID,task.* from work,task where work.UserID={$id} and work.TaskID=task.ID order by ID limit {$off},{$length}";
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
		<div class="date">
			<span class="fr"><a href="../task/add.php" tr class="btn-green">添加任务</a></span>
		</div>
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
				echo "<span class='col-12'><a href='../task/task.php?id={$rowUser['ID']}' target='_blank'> 查看</a></span>";
				echo "</p>";
				echo "</li>";
				echo "</ul>";
			}
			?>


		
			<!--分页s-->
			<div class="ep-pages">
				<?php
				echo "
				<form action='$_SERVER[REQUEST_URI]' method='get'>
				<p>共<i>{$total}</i>条  <i>{$totpage}</i>页　每页<input name='length' type='text' value=$length size='5'>条</p>
				<a href='$_SERVER[REQUEST_URI]?length=$length&page=1' class='ep-pages-ctrl'>&lt;&lt;</a>
				<a href='$_SERVER[REQUEST_URI]?length=$length&page={$prepage}' class='ep-pages-ctrl'>&lt;</a>
			 	<span class='current'>{$page}</span></a>
			 	<a href='$_SERVER[REQUEST_URI]?length=$length&page={$nextpage}' class='ep-pages-ctrl'>&gt;</a>
				<a href='$_SERVER[REQUEST_URI]?length=$length&page={$totpage}' class='ep-pages-ctrl'>&gt;&gt;</a>
				<em>跳到第<input name='page' type='text'>页<i class='jump'><input type='submit'value='确认' style='background-color:#4bc0c4;color:#fff'></form></i></em>"
				?>
			</div> 
			<!--分页e-->
		</div>
	</div>
</div>
</body>
</html>