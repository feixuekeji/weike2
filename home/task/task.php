<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
require_once "../../public/common/time2string.php";
$id=$_GET['id'];
$userId = $_SESSION['id'];
$sqlUser="select task.*,user.Username,user.Regtime,tasktype.Name as typeName from task,user,tasktype where task.ID={$id} and task.UserID=user.ID AND task.TypeID =tasktype.ID";

$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
?>


<!DOCTYPE html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	
  <link href="../public/css/task.css" media="screen" rel="stylesheet">
  <title>任务详情</title>	
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.all.min.js"> </script>
	<link type="text/css" rel="stylesheet" href="../../public/ueditor/third-party/video-js/video-js.css"/>
<script language="javascript" type="text/javascript" src="../../public/ueditor/third-party/video-js/video.js"></script>
	
   
 
</head>
<body>
<?php 
			include "../../public/common/header.php";
		 ?>	
<div class="taskers hall">


<div id="wrapper" class="container_24">
  

  <div id="content" class="grid_24">

<h5 class="tasker_title clearfix piece_tasker_title">
	<p class="fl">
	 
		<?php echo $rowUser['Name'] ?>
	</p>

	<p class="tasker_op_tool fr">

	</p>
</h5>

<div class="grid_9 alpha">
	<ul class="m10 dtstyle">
		<li><label>任务编号:</label><b><?php echo $rowUser['ID'] ?></b></li>
		<li>&nbsp</li>
		<li>
      <label>任务类型</label>
      <b><?php echo $rowUser['typeName'] ?></b>
		</li>
		<li>&nbsp</li>

		<li><label>悬赏金额:</label><b class="red"><?php echo $rowUser['Price'] ?>元</b></li>
		<li>&nbsp</li>
		<li>&nbsp</li>
		<li>任务状态: <span class="red"><?php 
		switch($rowUser['Status'])
				{
				case 0:
				echo "<span style='color: green;'>未领取</span>";
				break;
				case 1:
				echo "<span>进行中</span>";
				break;
				case 2:
				echo "<span>已完成</span>";
				break;
				case 3:
				echo "<span>未完成</span>";
				break;
				} ?></span></li>
		<li><span class="red" style="margin-left: 57px">&nbsp</span></li>
	</ul>
</div>


<div class="grid_9">
	<ul class="m10 dtstyle" style="margin-right: 0px">
	<div class="highBtn1 lhighBtn " style="width: 80px; margin-left: 50px; margin-top: 12px">
			<a class="btn canyu very_box" data-login-required="true" href="favorite.php?taskId=<?php echo $rowUser['ID'] ?>" >收藏任务</a>
	</div>
		<li class="task_status task_acting"></li>
		<li><label>开始时间:</label>
			<?php echo date('Y-m-d',$rowUser['PubTime']) ?></li>
		<li><label>到期时间:</label>
			<?php echo date('Y-m-d',$rowUser['DeadTime']) ?></li>
		<li id="djsTime"><label>剩余时间:</label>
			<span class="orange1"><?php echo time2string($rowUser['DeadTime']-time()) ?></span>
		</li>
	</ul>
</div>

<div class="grid_6 omega">
	<ul class="right_blue_block dtstyle">

		<li class="b">雇主信息: </li>
		<li class="head">
			<a href="http://www.weituitui.com/users/1"><img src="../public/css/person.png!64" class="ml10"></a>

		</li>
		<li><label>雇主: </label>
				<a href='../message/message.php?acceptName=<?php echo $rowUser['Username'] ?>'><?php echo $rowUser['Username'] ?></a><span class="ml10"></span>

		</li>
		<li><label>加入时间:</label><?php echo date('Y-m-d',$rowUser['Regtime']) ?></li>
		<li>
				<a class="gray_button very_box vam" title="发站内信" href='../message/message.php?acceptName=<?php echo $rowUser['Username'] ?>' data-login-required="true">发站内信</a>
	</li></ul>
</div>
<div class="clear"></div>

<div class="grid_10 alpha" style="margin-top: 6px">
	<div class="topmsg tac" style="padding: 5px"><span class="red">提示:领取任务后如果不能按时完成，将扣取任务金额的10%作为雇主的补偿</span></div>
</div>

<div class="grid_14 omega">
	<div class="grid_5 alpha">

	<div class="highBtn lhighBtn " style="width: 100px; margin-left: 50px; margin-top: 12px">

	<?php 

if($rowUser['bidder']==$userId){

    echo "<a class='btn canyu very_box' data-login-required='true' href='submitUe.php?taskid=$id' target='_blank' title='提交计件任务稿件'>提交稿件</a>";
}else
echo "<a class='btn canyu very_box' data-login-required='true' href='getTask.php?taskId={$rowUser['ID']}'>领取任务</a>";

?>
			
	</div>

	</div>
	<div class="grid_9 omega" style="margin-top: 6px">
		<div class="topmsg tac bold"><span class="red">请详细查看任务需求，否则有可能无法得到赏金!</span></div>
	</div>
	<div class="clear"></div>
</div>

<div class="clear"></div>


<div class="mt10  mb10">
	<div class="high_block" id="tasker_for_description">
		<div class="inner">
			<h3>任务描述<a name="tasker_description_anchor" target="_blank"></a></h3>

			<div class="fl" style="width: 500px">
				<?php echo $rowUser['Descript'] ?>
			</div>
			<div class="fr">
				<!-- <div class="special_require">
					<p class="title1"><strong>特殊要求:</strong></p>
					<p>
						单个用户最多提交<span class="red ml5 mr5">10</span>个稿件
					</p>
				</div> -->
			</div>
			<div class="clear"></div>

		</div>
	</div>

</div>


	

    <!-- <span class="last">
  <a href="/taskers/174572?page=23"><span class="translation_missing" title="translation missing: cn.views.pagination.last">Last</span></a>
</span>
 -->

</div>


  <div id="footer" class="grid_24">
    <p>
     <a target="_blank" href="../index.php" rel="nofollow">联系我们</a> | <a target="_blank" href="../index.php" rel="nofollow">关于我们</a> | <a target="_blank" href="../index.php" rel="nofollow">版权声明</a> | <a target="_blank" href="../index.php" rel="nofollow">帮助中心</a> |<a target="_blank" href="/article-2321-1.html" rel="nofollow">网站地图</a>
    </p>
         
    <br>
    <span><a target="_blank" id="page_bottom" href="#">飞雪威客</a>(<a href="#">www.weike.tk</a>) </span>
    <span class="ml10">400-000-000</span>
    <br>
   

    <span class="ml10">专业威客平台</span>
    <span class="ml10">Copyright @ 2010-2016 <a href="../index.php" target="_blank">飞雪威客</a> 版权所有  闽ICP备000000000号</span>
  </div>
  <div class="clear"></div>


</div>
<div class="nav"></div>




</div>
</body>
</html>