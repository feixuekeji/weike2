<!doctype html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>系统通知</title>
  <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../public/ueditor/ueditor.all.min.js"> </script>
</head>
<body>
<center>
  <div class="demo">
<form action="insert.php" method="post">

      <strong>通知标题：</strong>
      <td><input name="noticeTitle" type="text"></td>
      <input class="btn" id="sub_btn" type="submit" value="添加">
    <br>
      <td>通知内容：</td>
      <td><script type="text/plain" id="editor" name="noticeDetail">请输入详情</script></td>
      <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
        
    
</form>
</div>
</center>

<style type="text/css">
.demo{width:400px; margin:40px auto 0 auto; min-height:250px;}
.demo h3{line-height:24px; text-align:center; color:#360; font-size:16px}
.demo p{line-height:30px; padding:4px}
.demo p span{margin-left:6px; color:#f30}
.input{width:240px; height:24px; padding:2px; line-height:24px; border:1px solid #999}
.btn{position: relative;
overflow: hidden;
display:inline-block;
*display:inline;
padding:4px 20px 4px;
font-size:16px;
line-height:20px;
*line-height:22px;
color:#fff;
text-align:center;
vertical-align:middle;
cursor:pointer;
background-color:#5bb75b;
border:1px solid #cccccc;
border-color:#e6e6e6 #e6e6e6 #bfbfbf
;border-bottom-color:#b3b3b3;
-webkit-border-radius:4px;
-moz-border-radius:4px;
border-radius:4px;}
</style>
</body>

</html>