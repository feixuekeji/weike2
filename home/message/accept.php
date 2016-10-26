<?php
error_reporting(0);
session_start();
$id=$_SESSION['id'];
include "../../public/common/config.inc.php";
//获取数据列数，实现翻页
$sqlCnt="select count(*) from message where AcceptID={$id}";
$rstCnt=mysql_query($sqlCnt);
$rowCnt=mysql_fetch_row($rstCnt);
$total=$rowCnt[0];
$length=$_GET['length']?$_GET['length']:20;
$page=$_GET['page']?$_GET['page']:1;
$off=($page-1)*$length;
$totpage=ceil($total/$length);
$prepage=$page-1;
if($total>=$page)
	$nextpage=$page+1;
else
	$nextpage=$totpage;

$sqlUser="select message.*,user.Username from message,user where message.AcceptID={$id} and message.SendID=User.ID order by ID desc limit {$off},{$length}";
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

<div class="xsd w1020" style="height:100%;">
	<div class="title-bar">
		<span class="txt">收到的消息</span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-200">内容</span>
						<span class="col-4">发送时间</span>
						<span class="col-4">发送人</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-200'><textarea>{$rowUser['Message']}</textarea></span>";
				echo "<span class='col-4'>".date('Y-m-d H:i',$rowUser['PubTime'])."</span>";
				echo "<span class='col-4'>{$rowUser['Username']}</span>";
				echo "<span class='col-12'><a href='message.php?acceptName={$rowUser['Username']}' target='_blank'>回复</a></span>";
				
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