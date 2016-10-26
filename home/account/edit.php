<?php
session_start();
error_reporting(0);
include "../../public/common/config.inc.php";
$id=$_SESSION['accID'];
$sqlUser="select * from account where accID={$id}";
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
     
    

     <section class="reg_box">
      <form class="login-form" action="update.php" method="post">
      <div class="logo_icon"></div>
      <div class="logo_text">修改账户信息</div>
       <div class="form_body">
      
          <div class="control-group">
            <label class="control-label" for="username">姓名：</label>
            <div class="controls">
              <input type="text" class="span3" name='accName' value='<?php echo $rowUser['accName'] ?>'>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="username">支付宝账号：</label>
            <div class="controls">
              <input type="text" class="span3" name="accCardID" value='<?php echo $rowUser['accCardID'] ?>'>
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


  

</body>
</html>