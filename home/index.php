<?php
error_reporting(0);
session_start();
include "../public/common/config.inc.php";

//获取数据列数，实现翻页

$sqlUser="select * from tasktype order by ID";
$rstUser=mysql_query($sqlUser);


$sqlTask="select * from task order by ID desc limit 1,10";
$rstTask=mysql_query($sqlTask);

$sqlTask2="select * from task order by Price desc limit 1,10";
$rstTask2=mysql_query($sqlTask2);

/*$sqlTask3="select * from task order by ID desc limit 21,10";
$rstTask3=mysql_query($sqlTask3);*/


//通知

$sqlNotice="select * from notice order by noticeID desc limit 0,10";
$rstNotice=mysql_query($sqlNotice);
?>



<!doctype html>
<html lang="zh-CN">
<!-- Head -->
<head>
<title>飞雪威客 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Basic Styles-->
<link href="css/basic.css" rel="stylesheet" />
<link href="css/phpapp.css" rel="stylesheet" />
<script src="css/hm.js"></script>
<!--  Public  -->
<script src="css/foxphp.js"></script>

</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div>
    <!--  /Loading Container -->
    
    
     <div class="container-fluid header_top">

	<div class="container">
 	<div class="row">
     
    		 <div class="col-lg-7">
              <div class="row">
				<ul class="nav navbar-nav nav-top" id="MyStatus">
                <?php 
			if($_SESSION['login']){
				echo "<li><a href='/home/person/index.php' target='view_window'>欢迎 ".$_SESSION['username']."</a></li> <li><a href='/home/login/logout.php'>退出</a></li> ";
			}else{
				echo "<li><a href='/home/login/login.php'>登录</a><li> | ";
				echo "<li><a href='/home/login/register.php'>注册</a><li>";
			}
		 ?>
              	<span id="UserUid" style="display:none">0</span>
                </ul>
                
            </div>
                   
            </div>  
            
            
                 
                   
           <div class="col-lg-5">  
           <div class="row">
           <div class="nav_right">
           <ul class="nav navbar-nav nav-top">
           </ul>
           <ul class="nav navbar-nav nav-top">

            <li class="dropdown">
              <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心<span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
					 <li><a target="_blank" href="person/index.php" rel="nofollow">个人中心</a></li>
                    <!--  <li><a target="_blank" href="/buyer/evaluate">评价管理</a></li>
                     <li><a href="/buyer/refund" target="_blank">退款管理</a></li>
                     <li><a href="/buyer/report" target="_blank">我发的举报</a></li>
                     <li><a href="/buyer/report/other" target="_blank">我收到举报</a></li> -->
              </ul>
            </li>
            
            
            <!-- <li class="dropdown">
              <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">我是服务商<span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
					 <li><a target="_blank" href="/seller">交易管理</a></li>
                     <li><a target="_blank" href="/seller/shop">免费开店</a></li>
                     <li><a target="_blank" href="/fuwu/publish/index">发布服务</a></li>
                     <li><a href="/task" target="_blank">投标赚钱</a></li>
                     <li><a target="_blank" href="/seller/evaluate">评价管理</a></li>
                     <li><a href="/seller/refund" target="_blank">退款管理</a></li>
                     <li><a href="/seller/report" target="_blank">我发的举报</a></li>
                     <li><a href="/seller/report/other" target="_blank">我收到举报</a></li>
              </ul>
            </li> -->
            
            
            <li class="dropdown">
              <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">网站导航<span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
					<li><a href="#" target="_blank">网站地图</a></li>
              </ul>
            </li>
            
            
          </ul>

          </div>   
          </div>   
          </div>     
            
                   
     </div>
     </div>
     </div>
     
	<div class="container-fluid header">
     
     <div class="container">
     
 	<div class="row">
   
         <div class="header_ad">
      <!-- 头部顶部通栏 -->
     </div>
     </div>
     
     <div class="row padding_pt_20">
     <div class="col-lg-2">
     <div class="row">
     <div class="header_logo"><a href="#" title=""><img id="logo-header" src="/public/css/header/logo.png" alt="Logo"></a></div>
     </div>
     </div>
     
     <div class="col-lg-2">
     <div class="slogan">
     &nbsp;
     </div>
     </div>
     
     <div class="col-lg-6">
            <form role="search" class="navbar-form navbar-left" id="TopSearchForm" action="task/search.php" method="get">
            
            <div class="input-group input_search_group line_color">
          <div class="input-group-btn">
            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle input_search_select" type="button"></button>
           <!--  <ul role="menu" class="dropdown-menu dropdown_search">
              <li><a href="#" id="SearchFuwuShang">服务商</a></li>
              <li><a href="#" id="SearchTask">任务</a></li>
              <li><a href="#" id="SearchFuwu">服务</a></li>
            </ul> -->
          </div><!-- /btn-group -->
          <input type="text"  placeholder="搜索关键字" name="key" class="form-control input_search" style="width:400px;border-bottom-color: #FFF;border-right-color:#FFF;border-top-color:#FFF" value="">
          
          <div class="input-group-btn">
          <button class="btn btn-primary" type="submit"><strong>搜 索</strong></button>
          </div>
        </div>
        
            
          </form>
     </div>
     
     <div class="col-lg-2">
     <div class="row">

     	<div class="text-right" style="padding-top:8px;">
      		<a href="task/add.php" class="btn btn-primary" style="padding:8px;">免费发布任务</a>
     	 </div>

     </div>
     </div>
     
     </div>
     </div>
     </div>

     
    <div class="container-fluid btn-primary header_nav">
    <div class="row">
    <div class="container">

 		<div class="row">
       
                 
                         
                      <ul class="nav navbar-nav category_nav">
                         <li>
                      <a data-toggle="dropdown" aria-expanded="true" href="#">
                         首页
                      </a>
                      
                    </li>              
                    </ul>
                      
                      <ul class="nav navbar-nav ">
      							  <li><a href="task/index.php">任务大厅</a></li>

                      <?php
      while ($rowUser=mysql_fetch_assoc($rstUser)){
        
        echo "<li>";
        echo "<a href='task/index.php?typeId={$rowUser['ID']}'>{$rowUser['Name']}</a>";
        echo "</li>";
       
      }
      ?>

                      <li><a href="#">帮助</a></li>
        				   </ul>
                                            
                    
  
        </div>
          
          
          
          </div>
     </div>
     </div>


    

<div class="container-fluid" style="margin-top:15px;height:10px; padding:0px;">

           
</div>

<div class="container">
  <div class="row">
  
	<div class="col-lg-9">
      <div class="row">
			<div class="tabbable">
                <ul class="nav nav-tabs tabs-flat nav-justified">
                    <li class="active">
                        <a href="#hometoptask" data-toggle="tab">
                           最新任务
                        </a>
                    </li>
                     <li>
                        <a href="#homehottask" data-toggle="tab">
                            推荐任务
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#homenewtask" data-toggle="tab">
                            推荐任务
                        </a>
                    </li> -->
                </ul>
                <div class="tab-content tabs-flat">
                    <div class="tab-pane in active" id="hometoptask">
                        <div class="home_task_list">
                        	<ul>
                            <?php
          
      while ($rowTask=mysql_fetch_assoc($rstTask)){
        echo "<li>";
        echo "<p>";
        echo "<span class='home_task_subject'><a href='task/task.php?id={$rowTask['ID']}' target='_blank' data-toggle='tooltip'><span class='color_f60'>￥{$rowTask['Price']}</span>&nbsp;{$rowTask['Name']}</a></span>";
        echo " <span class='home_task_time'>".date('Y-m-d',$rowTask['DeadTime'])."&nbsp&nbsp&nbsp截止</span>"; 
        echo "</p>";
        echo "</li>";
    }
      ?>

                         

                             


                          </ul>
                        </div>
                    </div>
                    
                     <div class="tab-pane" id="homehottask">
                         <div class="home_task_list">
                                <ul>

                                 <?php
          
      while ($rowTask2=mysql_fetch_assoc($rstTask2)){
        echo "<li>";
        echo "<p>";
        echo "<span class='home_task_subject'><a href='task/task.php?id={$rowTask2['ID']}' target='_blank' data-toggle='tooltip'><span class='color_f60'>￥{$rowTask2['Price']}</span>&nbsp;{$rowTask2['Name']}</a></span>";
        echo " <span class='home_task_time'>".date('Y-m-d',$rowTask2['DeadTime'])."&nbsp&nbsp&nbsp截止</span>"; 
        echo "</p>";
        echo "</li>";
    }
      ?>


                                 

                                    
                                                               </ul>
                        </div>
                    </div>

                    <div class="tab-pane" id="homenewtask">
                  	  <div class="home_task_list">
                        	<ul>
         <?php
          
      /*while ($rowTask3=mysql_fetch_assoc($rstTask3)){
        echo "<li>";
        echo "<p>";
        echo "<span class='home_task_subject'><a href='task/task.php?id={$rowTask3['ID']}' target='_blank' data-toggle='tooltip'><span class='color_f60'>￥{$rowTask3['Price']}</span>&nbsp;{$rowTask3['Name']}</a></span>";
        echo " <span class='home_task_time'>".date('Y-m-d',$rowTask3['DeadTime'])."&nbsp&nbsp&nbsp截止</span>"; 
        echo "</p>";
        echo "</li>";
    }*/
      ?>









                          </ul>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
    
    <div class="col-lg-3 well-col-pl-30">
      <div class="row">
      
      <div class="tabbable home_rule">
            <ul id="myTab10" class="nav nav-tabs">
                <li class="active">
                    <a href="#homerule1" data-toggle="tab">
                        公告
                    </a>
                </li>
				<li>
                    <a href="#homerule2" data-toggle="tab">
                        资讯
                    </a>
                </li>
                <!-- <li>
                    <a href="#homerule3" data-toggle="tab">
                        提现
                    </a>
                </li> -->
                <li>
                    <a href="#homerule4" data-toggle="tab">
                        规则
                    </a>
                </li>

            </ul>

            <div class="tab-content home_tab-content">
                <div class="tab-pane active" id="homerule1">
                  <div class="home_rule_list">
                  	<ul>


                    <?php
      while ($rowNotice=mysql_fetch_assoc($rstNotice)){
        echo "<li>";
        echo "<a href='notice/notice.php?id={$rowNotice['noticeID']}' target='_blank' data-toggle='tooltip'>{$rowNotice['noticeTitle']}</a>";
          echo "<span".date('Y-m-d H:i',$rowNotice['noticeTime'])."</span>";
        echo "</li>";
      }
      ?>

                    </ul>
                  </div>
                </div>

				
                <div class="tab-pane" id="homerule2">
                  <div class="home_rule_list">
                  	<ul>
                    <li>中国和印度成为世界上最大互联网市场</li>
                    <li>为了改变人类出行 巨头们都做了哪些努力？</li>
                    <li>未来世界：VR和ER带来的颠覆性改变</li>
                    <li>就业领域三大新变化：共享经济迅速发展</li>



                    </ul>
                  </div>
                </div>
                
               <!--  <div class="tab-pane" id="homerule3">
                  <div class="home_rule_list">
                  	<ul>
                    <li>222</li>
                    </ul>
                  </div>
                </div> -->
                
                <div class="tab-pane" id="homerule4">
                  <div class="home_rule_list">
                  	<ul>
                    <li>任务发布协议</li>
                    <li>注册协议</li>
                    <li>消息系统使用协议</li>
                    <li>服务协议</li>

                    </ul>
                  </div>
                </div>
                
            </div>
        </div>
                                        
                                        
      <div class="well" style="text-align:center; height:212px;">
       	<h1>有需求?</h1>
        <p>无投稿退全款</p>
		<h4>专业威客帮你解决问题</h4>
        
        <p style="padding-top:10px;"><a class="btn btn-primary btn-lg" href="task/add.php" style="width:100%; padding:12px; font-size:18px">立刻发布任务</a></p>
       </div>
    </div>
  </div>
</div>
</div>

<div class="container">
  <div class="row">
  
	<div class="col-lg-12">
      <div class="row">
        <div class="well">
        	<!-- <h4>TA们在做什么？</h4> -->
               <div id="EventCarousel" class="carousel slide">
                  <div class="carousel-inner">
                  
                                   
                                    </div>
                </div>  
                
                
                <hr />
                
                <h4>任务流程</h4>
       		 <div data-target="#WiredWizardsteps" class="wizard wizard-wired" id="WiredWizard" style="border-bottom:0px;">
                    <ul class="steps">
                        <li class="active" data-target="#wiredstep1"><span class="step">1</span><span class="title">雇主发布任务</span><span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep2" class=""><span class="step">2</span><span class="title">威客领取任务</span> <span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep3" class=""><span class="step">3</span><span class="title">完成任务后投稿</span> <span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep4" class=""><span class="step">4</span><span class="title">雇主审核稿件</span> <span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep5" class=""><span class="step">5</span><span class="title">成功</span> <span class="chevron"></span></li>
                    </ul>

                </div>     
            <!--     
            <h3>招标流程</h3>
       		 <div data-target="#WiredWizardsteps" class="wizard wizard-wired" id="WiredWizard">
                    <ul class="steps">
                        <li class="active" data-target="#wiredstep1"><span class="step">1</span><span class="title">雇主发布任务无托管赏金</span><span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep2" class=""><span class="step">2</span><span class="title">威客报价格投标</span> <span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep3" class=""><span class="step">3</span><span class="title">雇主选投标中标并托管赏金</span> <span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep4" class=""><span class="step">4</span><span class="title">威客交接雇主确认支付</span> <span class="chevron"></span></li>
                        <li class="active" data-target="#wiredstep5" class=""><span class="step">5</span><span class="title">双方评价</span> <span class="chevron"></span></li>
                    </ul>

                </div>      
            -->                        
        </div>
      </div>
    </div>
    
</div>
</div>


<script>
$('.carousel').carousel();
</script>
<div class="container">
<div class="row">
 <!-- 广告通栏底部 -->
</div>
</div>
    
<div class="container-fluid footer footer_line">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 footer_help">
    	  <h3>新手指南</h3>
          <p>注册新用户</p>
   		  <p>雇主入门</p>
          <p>服务商入门</p>
          <p>规则中心</p>
      </div>
      <div class="col-lg-2 footer_help">
     	 <h3>我是雇主</h3>
         <p>发布任务</p>
   		  <p>雇主入门</p>
          <p>服务商入门</p>
          <p>规则中心</p>
      </div>
      <div class="col-lg-2 footer_help">
          <h3>我是服务商</h3>
         <p>开通店铺</p>
   		  <p>发布服务</p>
          <p>服务商入门</p>
          <p>规则中心</p>
      </div>
      <div class="col-lg-2 footer_help">
          <h3>交易担保</h3>
         <p>中标后支付</p>
   		  <p>发布服务</p>
          <p>服务商入门</p>
          <p>规则中心</p>
      
      </div>
     <!--  <div class="col-lg-4 footer_help">
      <img src="/assets/img/footer_logo.png"/>
      </div> -->
    </div>

  </div>
</div>

<div class="container-fluid footer">
  <div class="container">

    <div class="row text-center">                  
     <div class="breadcrumb">
     <li><a href="/">首页</a></li> 
     <li><a href="/website/about">关于我们</a></li>
     <li><a href="/news">新闻中心</a></li>
     <li><a href="/member/payin">支付方式</a></li>
     <li><a href="/website/contact">联系方式</a></li>
     <li><a href="/website/service">客服中心</a></li>
     <li><a href="/website/sitemap">网站地图</a></li>
     </div>
 	<p class="text-center">Copyright © 2006-2016  版权所有   </p>
    
    <div class="row">     
        <div class="theme-area">
            <ul id="skin-changer" class="colorpicker" style="width:300px; margin-left:auto; margin-right:auto;">
                <li><a rel="/assets/css/skins/blue.min.css" style="background-color:#5DB2FF;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/azure.min.css" style="background-color:#2dc3e8;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/teal.min.css" style="background-color:#03B3B2;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/green.min.css" style="background-color:#53a93f;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/orange.min.css" style="background-color:#FF8F32;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/pink.min.css" style="background-color:#cc324b;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/darkred.min.css" style="background-color:#AC193D;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/purple.min.css" style="background-color:#8C0095;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/darkblue.min.css" style="background-color:#0072C6;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/gray.min.css" style="background-color:#585858;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/black.min.css" style="background-color:#474544;" href="#" class="colorpick-btn"></a></li>
                <li><a rel="/assets/css/skins/deepblue.min.css" style="background-color:#001940;" href="#" class="colorpick-btn"></a></li>
            </ul>
       </div>
    </div>               
    </div>
    </div>
</div>  




</body><!--  /Body -->
</html>