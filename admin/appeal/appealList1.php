<?php
error_reporting(0);
include "../../public/common/config.inc.php";
//获取数据列数，实现翻页
$sqlCnt="select count(*) from appeal";
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

$sqlUser="select * from appeal,task where appeal.task_id = task.ID order by appeal_id desc limit {$off},{$length}";
$rstUser=mysql_query($sqlUser);
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>通知管理</title>	
</head>
<body>
	<center>
		<h2>查看已发布的通知</h2>
		<table width="900" border="1px" cellspacing="0">
        <tr>
				<th >ID</th>
                <th >发布时间</th>
				<th >任务名</th>
				<th >稿件查看</th>
				<th >审核</th>
			</tr>
			<?php
			while ($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<tr>";
				echo "<td>{$rowUser['appeal_id']}</td>";
				echo "<td>".date('Y年m月d日 H:i:s',$rowUser['appeal_time'])."</td>";
				echo "<td><a href='../../home/task/task.php?id={$rowUser['task_id']}' target='_blank'>{$rowUser['Name']}'</a></td>";
				echo "<td><a href='../work/workshow.php?workId={$rowUser['work_id']}' target='_blank'>查看</a></td>";
				switch($rowUser['appeal_status'])
				{
				case 0:
				echo "<td>待审核</td>";
				break;
				case 1:
				echo "<td>通过</td>";
				break;
				case 2:
				echo "<td>不通过</td>";
				break;
				}

				echo "
                <form action='appealSub.php' method='post'>
                <td><select name='status'> 
                <option value='0'>待审核</option>
                <option value='1'>通过</option>
                <option value='2'>不通过</option>
                </select>
                </td>
                <input type='hidden' name='appealId' value='{$rowUser['appeal_id']}'>
                <input type='hidden' name='userId' value='{$rowUser['UserID']}'>
                <input type='hidden' name='bidderId' value='{$rowUser['bidder']}'>
                <input type='hidden' name='taskId' value='{$rowUser['ID']}'>
                <td>
                <input type='submit' value='确认'>
                </td>
                </form>
                ";
				echo "</tr>";
			}
			?>
        
		</table>
		<?php
		//
		echo "<h3><form action='index.php' method='get'>共{$total}人    每页显示<input name='length' type='text' value=$length size='5'> 条 <input type='submit' value='确认'></form>   </h3> 
		<h3> <a href='index.php?length=$length&page=1'>首页</a>     <a href='index.php?length=$length&page={$prepage}'>上一页</a>     <a href='index.php?length=$length&page={$nextpage}'>下一页</a>     <a href='index.php?length=$length&page={$totpage}'>末页</a></h3>";
		?>
	</center>
</body>
</html>