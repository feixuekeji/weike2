<?php
error_reporting(0);
session_start();
$id=$_SESSION['id'];
include "../../public/common/config.inc.php";

//获取数据列数，实现翻
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

$sqlUser="select work.*,task.UserID,task.Name from work,task where work.UserID={$id} and work.TaskID=task.ID order by ID desc limit {$off},{$length}";
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

<link rel="stylesheet" href="../../js/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="../../js/jquery-ui/demo_style.css">
  <script src="../../js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
    $( "#dialog" ).dialog({
      autoOpen: false});
  });
$(document).ready(function(){
	$(".m_search_input").addClear();
	$(".m_search_input").focus();
});
</script>
<script type="text/javascript">
function edit(workid,TaskID){
	workId=workid;
	taskID=TaskID;
	$( "#dialog" ).dialog( "open" );
};

function subReason(){
	var msg=$("#msg").val();
	var url="appeal.php?workId="+workId+"&taskId="+taskID+"&Reason="+msg;
	$( "#dialog" ).dialog( "close" );
	$.get(url,function(data){
		
			alert(data);
      
    });
};

</script>
<style>
body,html{height:100%}
</style>
</head>

<body>
<div id="dialog" title="原因">
  <textarea id ="msg" rows="3" cols="20">
</textarea>
<button onclick="subReason();return false;">确认</button>
</div>
<!-- 学生管理 -->
<div class="xsd w1020" style="height:100%;">
	<div class="title-bar">
		<span class="txt">我提交的稿件</span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-60">作品详情</span>
						<span class="col-250">任务名</span>
						<span class="col-4">交稿时间</span>
						<span class="col-80">状态</span>
						<span class="col-250">备注</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-60'><a href=''workShow.php?workId={$rowUser['ID']}'>查看</a></span>";
				echo "<span class='col-250'>{$rowUser['Name']}</span>";
				echo "<span class='col-4'>".date('Y-m-d H:i',$rowUser['PubTime'])."</span>";
				switch($rowUser['Status'])
				{
				case 0:
				echo "<span class='col-80'>未审核</span>";
				break;
				case 1:
				echo "<span class='col-80'>合格</span>";
				break;
				case 2:
				echo "<span class='col-80'>不合格</span>";
				break;
				
				}
				echo "<span class='col-250'>{$rowUser['Reason']}</span>";
				if ($rowUser['Status']==2) {
				echo "<span class='col-12'><a href='appeal.php?workId={$rowUser['ID']}&taskId={$rowUser['TaskID']}' onclick='edit({$rowUser['ID']},{$rowUser['TaskID']});return false;'>申诉</a></span>";
				}else
				echo "<span class='col-12'></span>";
				echo "</p>";
				echo "</li>";
				echo "</ul>";
			}
			?>
		</div>
	</div>
</div>
<script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../js/index.js"></script>
<script src="../../js/login.js"></script>
</body>
</html>

