
<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
session_start();
$url=$_SERVER[HTTP_REFERER];

if($_SESSION['httpref']){
  $_SESSION['url']=$_SESSION['httpref'];
}else{
  $_SESSION['url']=$url;
}
include '../login/acl.inc.php';
include "../../public/common/config.inc.php";
$acceptName=$_GET['acceptName'];
$sqlUser="select ID from user where Username='{$acceptName}'";
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
$acceptid=$rowUser['ID']
?>
<!doctype html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>站内信</title>
  <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.all.min.js"> </script>
    <!-- <link rel="stylesheet" href="../public/css/index.css"> -->
</head>
<body>
  <div class="main">
    <?php 
      include "../../public/common/header.php";
     ?> 
  <div class="nav"></div>
<center>
<form action="insert.php" method="post">
   <tr>
    <td>收信人:</td>
    <td><input type="text" name='acceptName' value='<?php echo $acceptName ?>'></td>
    <td><input type="hidden" name='acceptid' value='<?php echo $acceptid ?>'></td>
   </tr>
   <br>

    <tr>
      
      <td><textarea class="fa" cols="20" id="message_body" name="descript" rows="5"></textarea></td>
      
      
    </tr>
  <tr>
        <td><input type="submit" value="发送站内信"></td>
 </tr>
</form>
</center>
<div class="nav"></div>

<?php
include"../../public/common/footer.php";
?>
</div>
</body>

</html>