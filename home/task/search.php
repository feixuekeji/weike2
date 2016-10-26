<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
require_once "../../public/common/time2string.php";
$key=$_GET['key'];
//获取数据列数，实现翻页
$sqlCnt="select count(*) from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.Name like '%$key%' or user.Username like '%$key%'";
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
//类型导航
$sqlUser="select task.*,user.Username,tasktype.Name as typeName from task,user,tasktype where task.UserID=user.ID AND task.TypeID =tasktype.ID AND task.Name like '%$key%' or user.Username like '%$key%' order by ID desc limit {$off},{$length}";


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
<!-- 学生管理 -->
<div class="xsd w1020" style="height:100%;">
    <div class="title-bar">
        <span class="txt">任务列表</span>
    </div>
    <div class="tab-con cjhz rcb xsgl" style="height:90%;">
        
        <div class="con">
            <ul class="head">
                <li>
                    <p>
                        <span class="col-220">任务名</span>
                        <span class="col-50">佣金</span>
                        <span class="col-50">发布人</span>
                        <span class="col-50">任务类型</span>
                        <span class="col-50">任务进度</span>
                        <span class="col-4"> 剩余时间</span>
                    </p>
                </li>
            </ul>
            <?php
            while ($rowUser=mysql_fetch_assoc($rstUser)){
                echo "<ul class='list'>";
                echo "<li>";
                echo "<p>";
                echo "<span class='col-220'><a href='task.php?taskId={$rowUser['ID']}'>{$rowUser['Name']}</a></span>";
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
                    echo "<span class='col-4' style='color: #FF5A00;'>".time2string($rowUser['DeadTime']-time())."</span>";
                    # code...
                }else
                echo "<span class='col-4'></span>";
                
                
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
                <a href='$_SERVER[REQUEST_URI]&length=$length&page=1' class='ep-pages-ctrl'>&lt;&lt;</a>
                <a href='$_SERVER[REQUEST_URI]&length=$length&page={$prepage}' class='ep-pages-ctrl'>&lt;</a>
                <span class='current'>{$page}</span></a>
                <a href='$_SERVER[REQUEST_URI]&length=$length&page={$nextpage}' class='ep-pages-ctrl'>&gt;</a>
                <a href='$_SERVER[REQUEST_URI]&length=$length&page={$totpage}' class='ep-pages-ctrl'>&gt;&gt;</a>
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