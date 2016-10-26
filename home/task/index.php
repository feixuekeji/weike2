<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
require_once "../../public/common/time2string.php";
//获取数据列数，实现翻页
$sqlCnt="select count(*) from task order by ID";
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

$sqlTT="select * from tasktype order by ID";
$rstTT=mysql_query($sqlTT);
//类型导航
$typeId=$_GET['typeId']?$_GET['typeId']:0;
$time=time();
if ($typeId==0) {
    $sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.review = '1' AND task.DeadTime-$time>0 order by ID desc limit {$off},{$length}";
   //echo $sqlUser; 
}else
if($typeId==100){
	$sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.TypeID={$typeId} AND task.Status = '0' order by ID desc limit {$off},{$length}";

}
else
if($typeId==101){
    $sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.TypeID={$typeId} AND task.Status = '1' order by ID desc limit {$off},{$length}";

}
else
if($typeId==102){
    $sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.TypeID={$typeId} AND task.Status = '2' order by ID desc limit {$off},{$length}";

}
else
if($typeId==103){
    $sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.TypeID={$typeId} AND task.Status = '3' order by ID desc limit {$off},{$length}";

}
else{
    $sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.TypeID={$typeId} AND task.review = '1' AND task.DeadTime-$time>0 order by ID desc limit {$off},{$length}";

}
//echo $sqlUser;

$rstUser=mysql_query($sqlUser);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<link rel="stylesheet" href="/public/css/header/bootstrap.min.css">


<link rel="stylesheet" href="../../css/base.css">
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/mCustomScrollbar.css">


<link rel="stylesheet" href="/public/css/header/style.css">
<link rel="stylesheet" href="/public/css/header/header1.css">
<link rel="stylesheet" href="/public/css/header/bootstrap-responsive.min.css">
<link rel="stylesheet" href="/public/css/header/style_responsive.css">
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

<div class="style-switcher">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading">Theme Colors</div>
    <ul class="unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light" data-style="light" data-header="light"></li>
    </ul>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->    

<!--=== Top ===-->    
<div class="top">
    <div class="container">			
        <ul class="loginbar pull-right"> 

        <?php 
            if($_SESSION['login']){

                 echo "<li>欢迎&nbsp;&nbsp;&nbsp; <a href='/home/person/index.php' class='login-btn' style='font-size:12px;color: #428bca !important;'>".$_SESSION['username']."</a></li>    
            <li class='devider'>&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href='/home/login/logout.php' class='login-btn' style='font-size:12px'>退出</a></li>   ";
            }else{
                echo "<li><a href='/home/login/login.php' class='login-btn' style='font-size:12px'>登录</a></li>    
            <li class='devider'>&nbsp;</li>
            <li><a href='/home/login/register.phpr' class='login-btn' style='font-size:12px'>注册</a></li>";
            }
         ?>
                </ul>
    </div>		
</div><!--/top-->
<!--=== End Top ===-->    

<!--=== Header ===-->
<div class="header">               
    <div class="container"> 
        <!-- Logo -->       
        <div class="logo1">                                             
            <a href="http://www.weike.tk/"><img id="logo-header" src="/public/css/header/logo.png" alt="Logo"></a>
        </div><!-- /logo -->        
                                    
        <!-- Menu -->       
        <div class="navbar">                                
            <div class="navbar-inner">                                  
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a><!-- /nav-collapse -->                                  
                <div class="nav-collapse collapse">                                     
                    <ul class="nav top-2">
					    <li>
                            <a href="/">首页</a>                     
                        </li>
                        
                        <li>
                            <a href="/home/task/index.php">任务大厅</a>                     
                        </li>
                        <li>
                            <a href="/home/task/add.php">发布需求</a>                     
                        </li>
                        <li class="active">
                            <a href="/home/person/index.php">个人中心</a>                     
                        </li>
                        <li>
                            <a href="/home/message/accept.php">短消息</a>                     
                        </li>
                        <li>
                            <a href="/home/notice/index.php">通知</a>                     
                        </li>
                          
                        <li>
                            <a href="/home/message/message.php?acceptName=admin" style="background:#f7f7f7">联系管理员</a>                 
                        </li>                              
                    </ul>
                    <!-- <div class="search-open">
                        <div class="input-append">
                            <form>
                                <input type="text" class="span3" placeholder="Search">
                                <button type="submit" class="btn-u">Go</button>
                            </form>
                        </div>
                    </div> -->
                </div><!-- /nav-collapse -->                                
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->                          
    </div><!-- /container -->               
</div><!--/header -->      

<div class="header">               
    <div class="container"> 
        <!-- Logo -->       
     
                                    
        <!-- Menu -->       
        <div class="navbar">                                
            <div class="navbar-inner">                                  
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a><!-- /nav-collapse -->                                  
                <div class="nav-collapse collapse">                                     
                    <ul class="nav top-2">
					    <li>
                            <a href="index.php">所有任务</a>                     
                        </li>
                        
                        <?php
      while ($rowTT=mysql_fetch_assoc($rstTT)){
        
        echo "<li>";
        echo "<a href='index.php?typeId={$rowTT['ID']}'>{$rowTT['Name']}</a>";
        echo "</li>";
       
      }
      ?>
                         <!-- <li>
                            <a href="index.php?typeId=00">未领取</a>                     
                        </li>
                         <li>
                            <a href="index.php?typeId=01">进行中</a>                     
                        </li> -->
                        <li>
                            <a href="index.php?typeId=102">已完成</a>                     
                        </li>
                        <li>
                            <a href="index.php?typeId=103">未完成</a>                     
                        </li>
                          
                                         
                    </ul>
                    <!-- <div class="search-open">
                        <div class="input-append">
                            <form>
                                <input type="text" class="span3" placeholder="Search">
                                <button type="submit" class="btn-u">Go</button>
                            </form>
                        </div>
                    </div> -->
                </div><!-- /nav-collapse -->                                
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->                          
    </div><!-- /container -->               
</div><!--/header -->      


<!-- 学生管理 -->
<div class="xsd w1020" style="height:100%;">
	<div class="title-bar">
		<!-- <span class="txt">任务列表</span> -->
	</div>
	<div class="tab-con cjhz rcb xsgl" style="height:90%;">
		<form action="search.php" method="get">
		<div class="date">
			<span class="m-search w220">
				<input name="key" type="text" class="m_search_input w220" placeholder="请输入任务标题或发布人">
			</span>
			
			<button type="submit" class="btn-search btn-green-h36">搜 索</button>
		</div>
		</form>
		<div class="con">
			<ul class="head">
				<li>
					<p>
						<span class="col-220">任务名</span>
						<span class="col-50">佣金</span>
						<span class="col-50">发布人</span>
						<span class="col-50">任务类型</span>
						<span class="col-50">任务进度</span>
						<span class="col-4"> 发布时间</span>
					</p>
				</li>
			</ul>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<ul class='list'>";
				echo "<li>";
				echo "<p>";
				echo "<span class='col-220'><a href='task.php?id={$rowUser['ID']}'>{$rowUser['Name']}</a></span>";
				echo "<span class='col-50' style='font-size: 20px; color: #FF5A00;'>{$rowUser['Price']}</span>";
				echo "<span class='col-50'>{$rowUser['Username']}</span>";
				echo "<span class='col-50'>{$rowUser['typeName']}</span>";
				switch($rowUser['Status'])
				{
				case 0:
				echo "<span class='col-50' style='color: green;'>未领取</span>";
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
				if ($rowUser['DeadTime']>time()) {
					echo "<span class='col-4' style='color: #FF5A00;'>".date('Y-m-d H:i',$rowUser['PubTime'])."</span>";
					# code...
				}else
				echo "<span class='col-4' style='color: #FF5A00;'>已过期</span>";
				
				
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