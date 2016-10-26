<!doctype html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>用户添加</title>
  <link href="../../public/css/base.css" rel="stylesheet">
</head>
<body>

<section class="reg_box">
      <form class="login-form" action="insert.php" method="post">
      <div class="logo_icon"></div>
      <div class="logo_text">添加用户</div>
       <div class="form_body">
            
          <div class="control-group">
            <label class="control-label" for="username">用户名：</label>
            <div class="controls">
              <input type="text" name="username" class="span3">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="inputPassword">密码：</label>
            <div class="controls">
              <input type="password" class="span3" name='password'>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="inputPassword">确认密码：</label>
            <div class="controls">
              <input type="password" class="span3" name='repassword'>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email：</label>
            <div class="controls">
              <input type="email" class="span3" name="email">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">是否管理员：</label>
            <div class="controls">
              <label>否:</label><input type="radio" checked="checked" name="admin" value="0" />
              <label>是：</label><input type="radio" name="admin" value="1" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
              <button type="submit" class="btn btn-large">确 认</button>
            </div>
          </div>
      </div>
    </form>
</section>
</body>

</html>