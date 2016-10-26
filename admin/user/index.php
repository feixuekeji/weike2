<?php
error_reporting(0);
include "../../public/common/config.inc.php";

//获取数据列数，实现翻页
$sqlCnt="select count(*) from user order by ID";
$rstCnt=mysql_query($sqlCnt);
$rowCnt=mysql_fetch_row($rstCnt);
$total=$rowCnt[0];

$length=$_GET['length']?$_GET['length']:10;
$page=$_GET['page']?$_GET['page']:1;
$off=($page-1)*$length;
$totpage=ceil($total/$length);
$prepage=$page-1;
if($total>=$page)
	$nextpage=$page+1;
else
	$nextpage=$totpage;

$key=$_GET['key'];
if (empty($key)) {
	$sqlUser="select * from user order by ID desc limit {$off},{$length}";
}else
$sqlUser="select * from user where Username like '%$key%' or Email like '%$key%' order by ID desc";
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
		<span class="txt">用户管理</span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		<div class="date">
			<form action="index.php" method="get">
		
			<span class="m-search w220">
				<input name="key" type="text" class="m_search_input w220" placeholder="用户名或邮箱">
			</span>
			
			<button type="submit" class="btn-search btn-green-h36">查 询</button>
		</form>
			<!-- <span class="m-search w220">
				<input name="" type="text" class="m_search_input w220" placeholder="学号">
			</span>
			<span class="m-search w220">
				<input name="" type="text" class="m_search_input w220" placeholder="学生姓名">
				
			</span>
			<button type="button" class="btn-search btn-green-h36">查 询</button> -->
			<span class="fr"><a href="add.php" class="btn-green">添加用户</a></span>
		</div>
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-80">用户编号</span>
						<span class="col-2">用户名</span>
						<span class="col-3">姓名</span>
						<span class="col-4">Email</span>
						<span class="col-5">手机号</span>
						<span class="col-6">QQ</span>
						<span class="col-150">是否管理员</span>
						<span class="col-8">注册时间</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-80'>{$rowUser['ID']}</span>";
				echo "<span class='col-2'>{$rowUser['Username']}</span>";
				echo "<span class='col-3'>{$rowUser['Realname']}</span>";
				echo "<span class='col-4'>{$rowUser['Email']}</span>";
				echo "<span class='col-5'>{$rowUser['Mobilephone']}</span>";
				echo "<span class='col-6'>{$rowUser['QQ']}</span>";
				if ($rowUser['admin']) {
					echo "<span class='col-150'>是</span>";
				}else
				echo "<span class='col-150'>否</span>";
				
				echo "<span class='col-8'>".date('Y-m-d H:i',$rowUser['Regtime'])."</span>";
				echo "<span class='col-12'><a href='delete.php?id={$rowUser['ID']}'>删除</a></span>";
				echo "</p>";
				echo "</li>";
				echo "</ul>";
			}
			?>


		
			<!--分页s-->
			<div class="ep-pages">
				<?php
				echo "
				<form action='index.php' method='get'>
				<p>共<i>{$total}</i>条  <i>{$totpage}</i>页　每页<input name='length' type='text' value=$length size='5'>条</p>
				<a href='index.php?length=$length&page=1' class='ep-pages-ctrl'>&lt;&lt;</a>
				<a href='index.php?length=$length&page={$prepage}' class='ep-pages-ctrl'>&lt;</a>
			 	<span class='current'>{$page}</span></a>
			 	<a href='index.php?length=$length&page={$nextpage}' class='ep-pages-ctrl'>&gt;</a>
				<a href='index.php?length=$length&page={$totpage}' class='ep-pages-ctrl'>&gt;&gt;</a>
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
