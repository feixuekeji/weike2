<?php
session_start();
include '../../login/acl.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>飞雪威客</title>
<link rel="stylesheet" href="../../../css/base.css">
<link rel="stylesheet" href="../../../css/style.css">
<link rel="stylesheet" href="../../../css/mCustomScrollbar.css">
<script src="../../../js/jquery.min.js"></script>
<style>
body,html{height:100%}
</style>
</head>

<body>
<!-- 左侧菜单s -->
<div class="glyd-menu" id="glyd-menu">
	<div class="logo"></div>
	<div class="user"><p><?php echo $_SESSION['username'] ?></p></div>
	<div class="nav">
		<div class="subNav">个人信息</div>
		<ul class="navContent">
			<li><a href="../edit.php" target="rFrame">修改个人信息</a></li>
			<li><a href="../../forgetpass/forget.php" target="rFrame">忘记密码</a></li>
		</ul>
		<div class="subNav">任务管理</div>
		<ul class="navContent">
			<li><a href="../indexTask.php" target="rFrame">我发布的任务</a></li>
			<li><a href="../tasksub.php" target="rFrame">我参与的任务</a></li>
			<li><a href="../../task/refund.php" target="rFrame">退款申请</a></li>
		</ul>
		<div class="subNav">稿件管理</div>
		<ul class="navContent">
			<li><a href="../workrec.php" target="rFrame">我收到的稿件</a></li>
			<li><a href="../work.php" target="rFrame">我提交的稿件</a></li>
		</ul>
		<div class="subNav">财务管理</div>
		<ul class="navContent">
			<li><a href="../../account/index.php" target="rFrame">账户信息</a></li>
			<li><a href="../../account/edit.php" target="rFrame">修改账户</a></li>
			<li><a href="../../account/topUP.php" target="rFrame">充值</a></li>
			<li><a href="../../account/withdrawel.php" target="rFrame">提现</a></li>
			<li><a href="../../account/topUPlist.php" target="rFrame">充值记录</a></li>
			<li><a href="../../account/withdrawelList.php" target="rFrame">提现记录</a></li>
		</ul>
		<div class="subNav">消息中心</div>
		<ul class="navContent">
			<li><a href="../../message/send.php" target="rFrame">我发送的消息</a></li>
			<li><a href="../../message/accept.php" target="rFrame">我收到的消息</a></li>
			<li><a href="../../message/message2.php" target="rFrame">发送消息</a></li>
			
		</ul>
		<div class="subNav">收藏夹</div>
		<ul class="navContent">
			<li><a href="../favoriteList.php" target="rFrame">收藏列表</a></li>	
		</ul>
		<div class="subNav">通知中心</div>
		<ul class="navContent">
			<li><a href="../../notice/index.php" target="rFrame">通知列表</a></li>
		</ul>
	</div>
	
	<div class="btn-glyd-set-up"><a href="../edit.php" target="rFrame"><i class="icon icon-glyd-set-up"></i>设置</a></div>
	<div class="btn-glyd-exit"><a href="../../login/logout.php" target="_top"><i class="icon icon-exit"></i>退出</a></div>
</div>
<!-- 左侧菜单e -->
<script src="../../../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../../js/index.js"></script>
</body>
</html>
