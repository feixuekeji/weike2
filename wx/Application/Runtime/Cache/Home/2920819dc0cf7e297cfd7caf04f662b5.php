<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php echo ($list[0][num1]); ?>
aaa<?php echo ($list[0]["num"]); ?>

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>
<?php echo ($vo["num"]); endforeach; endif; else: echo "" ;endif; ?>

 <tbody>
					
							<tr>
								<td class="text-center" style="padding-top: 15px;"><<?php echo ($list["id"]); ?>></td>
								<td class="text-center" style="padding-top: 15px;"><<?php echo ($list["num1"]); ?>></td>
								<td class="text-center" style="padding-top: 15px;"><<?php echo ($list["num2"]); ?>></td>
								
							</tr>
						</tbody> 
<div class="pages"><?php echo ($show); ?></div>

</body>
</html>