<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="/public/css/header/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/header/style.css">
    <link rel="stylesheet" href="/public/css/header/header1.css">
    <link rel="stylesheet" href="/public/css/header/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/public/css/header/style_responsive.css">
    <!-- CSS Implementing Plugins -->    
   
    <!-- CSS Theme -->    

    

</head>

<!--=== Style Switcher ===-->    
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
                            <a href="/home/index.php">任务大厅</a>                     
                        </li>
                        <li>
                            <a href="/home/task/add.php">发布需求</a>                     
                        </li>
                        <li>
                            <a href="/home/person/index.php" target="_blank">个人中心</a>                     
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
<!--=== End Header ===-->




<!-- <div class="copyright">
	<div class="container">
		<div class="row-fluid">
			<div class="span8">						
	            <p>Copyright © 2006-2016 FoxPHP.Com &nbsp; 桂ICP备06007684号</p>
			</div>
		</div>
	</div>
</div> -->

