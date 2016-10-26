<?php
function time2string($second){
	$day = floor($second/(3600*24));
	$second = $second%(3600*24);//除去整天之后剩余的时间
	$hour = floor($second/3600);
	$second = $second%3600;//除去整小时之后剩余的时间 
	$minute = floor($second/60);
	//$second = $second%60;//除去整分钟之后剩余的时间 
	//返回字符串
	if ($day<0||$hour<0||$minute<0) {

		return '0天0小时0分';
		# code...
	}
	return $day.'天'.$hour.'小时'.$minute.'分';//.$second.'秒';
}
?>