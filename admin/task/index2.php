<?php
error_reporting(0);
include "../../public/common/config.inc.php";

//获取数据列数，实现翻页
$sqlCnt="select count(*) from task order by ID";
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

$sqlUser="select * from task order by ID limit {$off},{$length}";
$rstUser=mysql_query($sqlUser);
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>任务管理</title>	
</head>
<body>
	<center>
		<h2>查看任务</h2>
		<table width="1200" border="1px" cellspacing="0">
        <tr>
				<th >ID</th>
				<th >任务标题</th>
				<th >类型</th>
                <th >佣金</th>
                <th >发布者</th>
                <th >发布时间</th>
                <th >截止时间</th>
                <th >任务状态</th>
                
				<th >停止</th>
				<th >删除</th>
			</tr>
            
            
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<tr>";
				echo "<td>{$rowUser['ID']}</td>";
				echo "<td><a href='task.php?taskId={$rowUser['ID']}'>{$rowUser['Name']}</a></td>";
				echo "<td>{$rowUser['TypeID']}</td>";
				echo "<td>{$rowUser['Price']}</td>";
				echo "<td>{$rowUser['UserID']}</td>";
				echo "<td>".date('Y年m月d日 H:i:s',$rowUser['PubTime'])."</td>";
				echo "<td>".date('Y年m月d日 H:i:s',$rowUser['DeadTime'])."</td>";
				echo "<td>{$rowUser['Status']}</td>";
				echo "<td><a href='stop.php?id={$rowUser['ID']}'>停止</a></td>";
				echo "<td><a href='delete.php?id={$rowUser['ID']}'>删除</a></td>";
				echo "</tr>";
			}
			?>
        
		</table>
		<?php
		//
		echo "<h3><form action='index.php' method='get'>共{$total}个    每页显示<input name='length' type='text' value=$length size='5'> 条 <input type='submit' value='确认'></form>   </h3> 
		<h3> <a href='index.php?length=$length&page=1'>首页</a>     <a href='index.php?length=$length&page={$prepage}'>上一页</a>     <a href='index.php?length=$length&page={$nextpage}'>下一页</a>     <a href='index.php?length=$length&page={$totpage}'>末页</a></h3>";
		?>
	</center>
</body>
</html>