<?php
error_reporting(0);
include "../../public/common/config.inc.php";
//获取数据列数，实现翻页
$sqlCnt="select count(*) from notice";
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

$sqlUser="select * from notice order by noticeID desc limit {$off},{$length}";
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
		<span class="txt">通知管理</span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		<div class="date">
			
			<span class="fr"><a href="add.php" class="btn-green">发布通知</a></span>
		</div>
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-60">编号</span>
						<span class="col-100">发布人</span>
						<span class="col-220">标题</span>
						<span class="col-4">发布时间</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-60'>{$rowUser['noticeID']}</span>";
				echo "<span class='col-100'>{$rowUser['noticeUname']}</span>";
				echo "<span class='col-220'>{$rowUser['noticeTitle']}</span>";
			    echo "<span class='col-4'>".date('Y-m-d H:i',$rowUser['noticeTime'])."</span>";
				echo "<span class='col-12'><a href='notice.php?id={$rowUser['noticeID']}'>查看</a>  |   <a href='delete.php?noticeID={$rowUser['noticeID']}'>删除</a></span>";
				//<a href='edit.php?noticeID={$rowUser['noticeID']}'>修改</a>  | 
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
<script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../js/index.js"></script>
<script src="../../js/login.js"></script>
</body>
</html>
