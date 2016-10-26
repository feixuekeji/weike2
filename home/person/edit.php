<?php
error_reporting(0);
session_start();
include "../../public/common/config.inc.php";
$id=$_SESSION['id'];
$sqlUser="select * from user where ID={$id}";
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户修改</title>
      
      <link href="../../public/css/base.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="images/html5shiv.js"></script>
<![endif]-->
</head>
<body>
      <div class="main">

     <section class="reg_box">
      <form class="login-form" action="update.php" method="post">
      <div class="logo_icon"></div>
      <div class="logo_text">修改用户</div>
       <div class="form_body">
          <div class="control-group">
            <label class="control-label" for="username">用户名</label>
            <div class="controls">
              <input type="text" name="username" class="span3" value='<?php echo $rowUser['Username'] ?>'>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">姓名</label>
            <div class="controls">
              <input type="text" class="span3" name='realname' value='<?php echo $rowUser['Realname'] ?>'>
            </div>
          </div> 
          <div class="control-group">
            <label class="control-label">Email：</label>
            <div class="controls">
              <input type="email" class="span3" name="email" value='<?php echo $rowUser['Email'] ?>'>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">手机号码：</label>
            <div class="controls">
              <input type="text" class="span3" name='mobilephone' value='<?php echo $rowUser['Mobilephone'] ?>'>
            </div>
          </div>



          <div class="control-group">
            <label class="control-label">QQ:</label>
            <div class="controls">
              <input type="text" class="span3" name='QQ' value='<?php echo $rowUser['QQ'] ?>'>
            </div>
          </div>

          <input type="hidden" name='id' value='<?php echo $id ?>'>     
    

          <div class="control-group">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
              <button type="submit" class="btn btn-large">确 认</button>
            </div>
          </div>
      </div>
    </form>
</section>


  <div class="nav"></div>
  <!--
	<center>
		<h2>修改用户</h2>
		<form action="update.php" method='post'>
			<table width="400"  cellspacing="0">
            <tr>
				<td>ID</td>
				<td><?php echo $rowUser['ID'] ?></td>

			</tr>
            <tr>
            	<td>用户名:</td>
            	<td><input type="text" name='username' value='<?php echo $rowUser['Username'] ?>'></td>
            </tr>
            
            <tr>
            	<td>姓名：</td>
            	<td><input type="text" name='realname' value='<?php echo $rowUser['Realname'] ?>'></td>
            </tr>
            <tr>
            	<td>E-mail：</td>
            	<td><input type="email" name='email' value='<?php echo $rowUser['Email'] ?>'></td>
            </tr>
            <tr>
            	<td>手机号码：</td>
            	<td><input type="text" name='mobilephone' value='<?php echo $rowUser['Mobilephone'] ?>'></td>
            </tr>
            <tr>
            	<td>QQ：</td>
            	<td><input type="text" name='QQ' value='<?php echo $rowUser['QQ'] ?>'></td>
            </tr>
           
            <tr>
            	<input type="hidden" name='id' value='<?php echo $id ?>'>
            	<td align='center'><input type="submit" value="修改"></td>
            	<td align='center'><input type="reset" value="重置"></td>
            </tr>      
		</table>
	</form>
		
	</center>
      <div class="nav"></div>-->


</div>
</body>
</html>