<?php
error_reporting(0);
include "../../public/common/config.inc.php";
$id=$_GET['id'];
$sqlUser="select * from task where ID={$id}";
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>任务修改</title>	
</head>
<body>
	<center>
		<h2>修改任务</h2>
		<form action="update.php" method='post'>
			<table width="600" border="1px" cellspacing="0">
            <tr>
				<td>ID</td>
				<td><?php echo $rowUser['ID'] ?></td>

			</tr>
            <tr>
            	<td>任务名:</td>
            	<td><input type="text" name='taskname' value='<?php echo $rowUser['Name'] ?>'></td>
            </tr>
            <tr>
            	<td>任务详情：</td>
            	<td><textarea name='descript' cols="50" rows="8"><?php echo $rowUser['Descript'] ?></textarea></td>
            </tr>
            <tr>
            	<td>任务类型：</td>
            	<td><input type="text" name="typeid" value='<?php echo $rowUser['TypeID'] ?>'></td>
            </tr>
            <tr>
            	<td>任务金额：</td>
            	<td><input type="text" name='price' value='<?php echo $rowUser['Price'] ?>'></td>
            </tr>
            <tr>
            	<td>发布者：</td>
            	<td><input type="text" name="userid" value='<?php echo $rowUser['UserID'] ?>'></td>
            </tr>
            <tr>
            	<td>截止时间：</td>
            	<td><input name="deadtime" type="date" value='<?php echo date('Y-m-d',$rowUser['DeadTime']) ?>'></td>
            </tr>
            <tr>
            	<td>任务状态：</td>
            	<td><input type="text" name='status' value='<?php echo $rowUser['Status'] ?>'></td>
            </tr>
            <tr>
            	<input type="hidden" name='id' value='<?php echo $id ?>'>
            	<td align='center'><input type="submit" value="修改"></td>
            	<td align='center'><input type="reset" value="重置"></td>
            </tr>      
		</table>
	</form>
		
	</center>
</body>
</html>