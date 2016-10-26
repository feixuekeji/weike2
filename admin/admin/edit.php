<?php 
 ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>index</title>
	 <link href="../../public/css/base.css" rel="stylesheet">
</head>
<body>

<section class="reg_box">
      <form class="login-form" action="update.php" method="post">
      <div class="logo_icon"></div>
      <div class="logo_text">管理员密码修改:</div>
       <div class="form_body">
      
          <div class="control-group">
            <label class="control-label" for="username">管理员：</label>
            <div class="controls">
              <input type="text" class="span3" value='admin' disabled>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="username">密码:</label>
            <div class="controls">
              <input type="text" class="span3" name='password'>
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
	<
</body>
</html>