<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>题库</title>
    <link rel="stylesheet" href="../style/css.css" type="text/css">
    <script  src="style/tiku.js" language="javascript"> </script>
    <script  src="style/jquery.min.js" language="javascript"> </script>
</head>
<body>
   添加作业<br><br>
   <form action="aaa.php" method="post" enctype="multipart/form-data" name="form1" >

   标题：<input type="text" size="40" name="title"><br><br>添加选择题：<input type="button" name="xx" onclick="addNewSelect();" value="增加一题" ><input type="button" name="yy" onclick="removeSelect();" value="删除一题" >
    <table width="580 "  border="1" cellpadding="0" cellspacing="0" id="myTab">
    <tr>
    <td width="160" align="center">序号</td>
    <td width="250" align="center">题目</td>
    <td width="150" align="center">答案</td>
    </tr>
    </table>
    <hr>
     添加主观题：<input type="button" name="ss" onclick="addNewRad();" value="增加一题" ><input type="button" name="ww" onclick="removeRad();" value="删除一题" >
    <table width="580 "  border="1" cellpadding="0" cellspacing="0" id="myTab1">
    <tr>
    <td width="160" align="center">序号</td>
    <td width="250" align="center">题目</td>
    <td width="150" align="center">参考答案</td>
    </tr>
    </table>

    <hr>
    <table width="580 " border="" cellpadding="5" cellspacing="0" >
        <tr><td>命题教师</td><td><input type="text" name="hwtea" readonly></td></tr>
         <tr><td>布置日期</td><td><input type="text" name="start" readonly></td></tr>
          <tr><td>提交日期</td><td><input type="text" name="end" readonly></td></tr>
           <tr><td><img src="../image/okay.png">
           <input type="submit"  value="发布作业">
             <input type="hidden" name="submit" value="hw">
           </td></tr>
    </table>
        </form>
</body>
</html>