<?php
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<!-- <title>系统安装</title>
</head>
<body>
	<center>
	<h1>数据库安装</h1>
	<form action='install.php' method='post'>
		<table width=500px border='1px' cellspacing='1'>
			<h3>填写数据库信息</h3>

			<tr>
				<td>数据库服务器：</td>
				<td><input type="text" name='host' value='localhost'></td>
			</tr>
			<tr>
				<td>数据库名：</td>
				<td><input type="text" name='database' value='weike'></td>
			</tr>
			<tr>
				<td>数据库用户名：</td>
				<td><input type="text" name='user' value='root'></td>
			</tr>
			<tr>
				<td>数据库密码：</td>
				<td><input type="password" name='password'></td>
			</tr>
			
		</table>
		<table width=500px border='1px' cellspacing='1'>
			
			<tr><h3>填写管理员信息</h3></tr>
			<tr>
				<td>管理员账号：</td>
				<td><input type="text" name='admin' value='admin'></td>
			</tr>
			<tr>
				<td>管理员密码：</td>
				<td><input type="password" name='adminpassword' value='123'></td>
			</tr>
		</table>
		        <tr>
					<td><input type="submit" value='提交'></td>
				
					<td><input type="reset" value='重置'></td>
				</tr>

</center>
</body>
</html>
 -->

<title>系统安装</title>
<link href="../home/login/images/base.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="images/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<section class="reg_box">
	<form class="login-form" action="install.php" method="post">
                   		<div class="logo_icon"></div>
						<div class="logo_text">数据库安装</div>
        <div class="form_body">
          <div class="control-group">
            <label class="control-label" for="host">数据库服务器：</label>
            <div class="controls">
              <input type="text" id="host" class="span3" name='host' value='localhost'>
            </div>
          </div>
        <div class="control-group">
            <label class="control-label" for="database">数据库名：</label>
            <div class="controls">
              <input type="text" id="database" class="span3" name='database' value='weike'>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="user">数据库用户名：</label>
            <div class="controls">
              <input type="text" id="user" class="span3" name='user' value='root'>
            </div>
        </div>
       

        <div class="control-group">
            <label class="control-label" for="password">数据库密码：</label>
            <div class="controls">
              <input type="password" id="password"  class="span3" placeholder="请输入密码" name="password">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="admin">管理员账号：</label>
            <div class="controls">
              <input type="text" id="admin" class="span3" name='admin' value='admin'>
            </div>
        </div>     
           

        <div class="control-group">
            <label class="control-label" for="adminpassword">管理员密码： </label>
            <div class="controls">
              <input type="password" id="adminpassword"  class="span3" placeholder="请输入密码" name='adminpassword' value='123'>
            </div>
        </div>
    

          <div class="control-group">
          	<label class="control-label">&nbsp;</label>
            <div class="controls">
              <button type="submit" class="btn btn-large">安 装</button>
            </div>
          </div>
      </div>
    </form>
</section>
</body>
</html>