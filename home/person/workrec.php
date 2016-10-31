<?php
error_reporting(0);
header('content-type:text/html;charset=utf-8');
session_start();
$id=$_SESSION['id'];
include "../../public/common/config.inc.php";
$sqlUser="select work.*,task.UserID,task.Name from work,task where task.UserID={$id} and work.TaskID=task.ID order by ID desc";
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


<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
function edit(workid){
	workId=workid;
	$( "#dialog" ).dialog( "open" );
};

function ok(workid){
	workId=workid;
	$.get("workRecSub.php?status=1&workid="+workId,function(data){
		
			alert(data);
      
    });
};

function subReason(){
	var msg=$("#msg").val();
	var url="workRecSub.php?status=2&workid="+workId+"&Reason="+msg;
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
		<span class="txt">我收到的稿件</span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-100">作品详情</span>
						<span class="col-280">任务名</span>
						<span class="col-4">交稿时间</span>
						<span class="col-100">状态</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-100'><a href=''workShow.php?workId={$rowUser['ID']}'>查看</a></span>";
				echo "<span class='col-280'>{$rowUser['Name']}</span>";
				echo "<span class='col-4'>".date('Y-m-d H:i',$rowUser['PubTime'])."</span>";
				switch($rowUser['Status'])
				{
				case 0:
				echo "<span class='col-100'>未审核</span>";
				break;
				case 1:
				echo "<span class='col-100'>合格</span>";
				break;
				case 2:
				echo "<span class='col-100'>不合格</span>";
				break;
				
				}
				if ($rowUser['Status']==0) {
				echo "<span class='col-12'><a href='workRecSub.php?status=1&workid={$rowUser['ID']}' onclick='ok({$rowUser['ID']});return false;'> 合格</a> ｜ <a href='workRecSub.php?status=2&workid={$rowUser['ID']}' onclick='edit({$rowUser['ID']});return false;'> 不合格</a></span>";
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
