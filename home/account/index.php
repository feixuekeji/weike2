<?php
error_reporting(0);

include "../../public/common/config.inc.php";
session_start();
$id=$_SESSION['id'];
$sqlUser="select * from account where UID={$id}";
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
		<span class="txt">账号信息</span>
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-60">编号</span>
						<span class="col-150">姓名</span>
						<span class="col-150">提现支付宝账号</span>
						<span class="col-150">余额</span>
						<span class="col-12">操作</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-60'>{$rowUser['accID']}</span>";
				echo "<span class='col-150'>{$rowUser['accName']}</span>";
				echo "<span class='col-150'>{$rowUser['accCardID']}</span>";
				echo "<span class='col-150'>{$rowUser['accBalance']}</span>";
				echo "<span class='col-12'><a href='edit.php'>修改</a></span>";
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