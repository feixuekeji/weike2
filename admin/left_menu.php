<?php
session_start();
include '../public/common/acl.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>飞雪威客</title>
<link rel="stylesheet" href="../css/base.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/mCustomScrollbar.css">
<script src="../js/jquery.min.js"></script>
<style>
body,html{height:100%}
</style>
</head>

<body>
<!-- 左侧菜单s -->
<div class="glyd-menu" id="glyd-menu">
	<div class="logo"></div>
	<div class="user"><p><?php echo $_SESSION['adminname'] ?></p></div>
	<div class="nav">
		<div class="subNav">用户管理</div>
		<ul class="navContent">
			<li><a href="user/index.php" target="rFrame">查看用户</a></li>
			<li><a href="user/add.php" target="rFrame">添加用户</a></li>
		</ul>
		<div class="subNav">任务管理</div>
		<ul class="navContent">
			<li><a href="task/index.php" target="rFrame">查看任务</a></li>
			<li><a href="task/review.php" target="rFrame">任务审核</a></li>
		</ul>
		<div class="subNav">任务类型管理</div>
		<ul class="navContent">
			<li><a href="tasktype/index.php" target="rFrame">查看类型</a></li>
			<li><a href="tasktype/add.php" target="rFrame">添加类型</a></li>
		</ul>
		<div class="subNav">申诉处理</div>
		<ul class="navContent">
			<li><a href="appeal/appealList.php" target="rFrame">申诉处理</a></li>
		</ul>
		<div class="subNav">消息中心</div>
		<ul class="navContent">
			<li><a href="../home/message/send.php" target="rFrame">我发送的消息</a></li>
			<li><a href="../home/message/accept.php" target="rFrame">我收到的消息</a></li>
			<li><a href="../home/message/message2.php" target="rFrame">发送消息</a></li>
			
		</ul>
		<div class="subNav">财务管理</div>
		<ul class="navContent">
			<li><a href="account/index.php" target="rFrame">账户列表</a></li>
			<li><a href="account/topUPlist.php" target="rFrame">充值审核</a></li>	
			<li><a href="account/withdrawelList.php" target="rFrame">提现审核</a></li>
					
		</ul>
		<div class="subNav">通知中心</div>
		<ul class="navContent">
			<li><a href="notice/index.php" target="rFrame">通知列表</a></li>
			<li><a href="notice/add.php" target="rFrame">发布通知</a></li>
		</ul>



		<div class="subNav">退款申请</div>
		<ul class="navContent">
			<li><a href="refund/refundList.php" target="rFrame">退款申请</a></li>
		</ul>

	</div>
	
	<div class="btn-glyd-set-up"><a href="admin/edit.php" target="rFrame"><i class="icon icon-glyd-set-up"></i>设置</a></div>
	<div class="btn-glyd-exit"><a href="login/exit.php" target="_top"><i class="icon icon-exit"></i>退出</a></div>
</div>
<!-- 左侧菜单e -->
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../js/index.js"></script>
</body>
</html>
