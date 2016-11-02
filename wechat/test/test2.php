<?php
/**
 * 微信扩展接口测试
 */
	include("../wechatext.class.php");
	
	function logdebug($text){
		file_put_contents('../data/log.txt',$text."\n",FILE_APPEND);		
	};
	
	$options = array(
	    'account'=>'[
{
    "domain": ".qq.com",
    "expirationDate": 2147385600,
    "hostOnly": false,
    "httpOnly": false,
    "name": "o_cookie",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "781465774",
    "id": 1
},
{
    "domain": ".qq.com",
    "expirationDate": 1790126273.007006,
    "hostOnly": false,
    "httpOnly": false,
    "name": "pac_uid",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "1_781465774",
    "id": 2
},
{
    "domain": ".qq.com",
    "hostOnly": false,
    "httpOnly": false,
    "name": "pgv_info",
    "path": "/",
    "secure": false,
    "session": true,
    "storeId": "0",
    "value": "ssid=s3932636984",
    "id": 3
},
{
    "domain": ".qq.com",
    "expirationDate": 2147385600,
    "hostOnly": false,
    "httpOnly": false,
    "name": "pgv_pvi",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "4738625536",
    "id": 4
},
{
    "domain": ".qq.com",
    "expirationDate": 2147385600,
    "hostOnly": false,
    "httpOnly": false,
    "name": "pgv_pvid",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "599721815",
    "id": 5
},
{
    "domain": ".qq.com",
    "hostOnly": false,
    "httpOnly": false,
    "name": "pgv_si",
    "path": "/",
    "secure": false,
    "session": true,
    "storeId": "0",
    "value": "s6925125632",
    "id": 6
},
{
    "domain": ".qq.com",
    "expirationDate": 1577923202.303624,
    "hostOnly": false,
    "httpOnly": false,
    "name": "pt2gguin",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "o0781465774",
    "id": 7
},
{
    "domain": ".qq.com",
    "expirationDate": 1577923202.265531,
    "hostOnly": false,
    "httpOnly": false,
    "name": "ptcz",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "858ff71e63b681f0e3c709dd575e846a0fbc59aff7d439469e67cd80344f341f",
    "id": 8
},
{
    "domain": ".qq.com",
    "hostOnly": false,
    "httpOnly": false,
    "name": "ptisp",
    "path": "/",
    "secure": false,
    "session": true,
    "storeId": "0",
    "value": "cnc",
    "id": 9
},
{
    "domain": ".qq.com",
    "expirationDate": 1790496281.693828,
    "hostOnly": false,
    "httpOnly": false,
    "name": "RK",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "YFnfe+gGPp",
    "id": 10
},
{
    "domain": ".qq.com",
    "hostOnly": false,
    "httpOnly": false,
    "name": "skey",
    "path": "/",
    "secure": false,
    "session": true,
    "storeId": "0",
    "value": "@ZxI7zIvE0",
    "id": 11
},
{
    "domain": ".qq.com",
    "expirationDate": 1790496862,
    "hostOnly": false,
    "httpOnly": false,
    "name": "tvfe_boss_uuid",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "6cb6faa8e17eddb0",
    "id": 12
},
{
    "domain": ".qq.com",
    "hostOnly": false,
    "httpOnly": false,
    "name": "uin",
    "path": "/",
    "secure": false,
    "session": true,
    "storeId": "0",
    "value": "o0781465774",
    "id": 13
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "account",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "xingxiong.fei@163.com",
    "id": 14
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "bizuin",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "3080703016",
    "id": 15
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "cert",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "tND9FmP2kfreMOAqF7shA6GvXO1KpVAf",
    "id": 16
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "data_bizuin",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "2399229319",
    "id": 17
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "data_ticket",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "HfTCz6m1S5DCHYYum0kKLVWPeIcZ/zw+276xTw680T7TfJwiwOLIenQUxg7OUc1J",
    "id": 18
},
{
    "domain": "mp.weixin.qq.com",
    "expirationDate": 1480659383,
    "hostOnly": true,
    "httpOnly": false,
    "name": "noticeLoginFlag",
    "path": "/",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "1",
    "id": 19
},
{
    "domain": "mp.weixin.qq.com",
    "expirationDate": 1480557807,
    "hostOnly": true,
    "httpOnly": false,
    "name": "noticeLoginFlag",
    "path": "/cgi-bin",
    "secure": false,
    "session": false,
    "storeId": "0",
    "value": "1",
    "id": 20
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "slave_sid",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "Ql9UeUNIV2ZSaXR2NjFhUEs5N3I4N3VIV3BQSlBYR2tBeFMyTVh0ZzF6VVlUdmpnOFZEY0RLSU1QTzk1MDlpRTFLdWRFODVaNTlmVTNHMUNNdGluSl9wblltdTRENlowbEJkVkU0c0pVVlhKSzBKYUdqZ2x6NVBKem9kSms3d081ZUFRNEF3TDlVTlpLU1NO",
    "id": 21
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "slave_user",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "gh_29ddbf1f67dd",
    "id": 22
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "ticket",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "a5503ed80146bdfe4a4338ed55885166cdde46d7",
    "id": 23
},
{
    "domain": "mp.weixin.qq.com",
    "hostOnly": true,
    "httpOnly": true,
    "name": "ticket_id",
    "path": "/",
    "secure": true,
    "session": true,
    "storeId": "0",
    "value": "gh_29ddbf1f67dd",
    "id": 24
},
{
    "domain": "mp.weixin.qq.com",
    "expirationDate": 2147483647,
    "hostOnly": true,
    "httpOnly": true,
    "name": "ua_id",
    "path": "/",
    "secure": true,
    "session": false,
    "storeId": "0",
    "value": "t6PLy8wKhJpnmJDOAAAAAEwIfthCqd2FrC8ZIzGMcXk=",
    "id": 25
}
]',
		'account'=>'xingxiong.fei@163.com',
		'password'=>'ff1234',
		'datapath'=>'../data/cookie_',
			'debug'=>true,
			'logcallback'=>'logdebug'	
	); 
	$wechat = new Wechatext($options);
	if ($wechat->checkValid()) {
		//获取分组列表
		$grouplist = $wechat->getGroupList();
		var_dump($grouplist);
		//获取用户列表
		$userlist = $wechat->getUserlist(0,10);
		var_dump($userlist);
		$user = $userlist[0];
		// 获取用户信息
		$userdata = $wechat->getInfo($user['id']);
		var_dump($userdata);
		// 获取已保存的图文消息
		$newslist = $wechat->getNewsList(0,10);
		var_dump($newslist);
		//获取用户最新消息
		$topmsg = $wechat->getTopMsg();
		var_dump($topmsg);
		$msglist = $wechat->getMsg();
		var_dump($msglist);
		// 主动回复消息
		if ($topmsg && $topmsg['has_reply']==0){
		    $wechat->send($user['id'],'hi '.$topmsg['nick_name'].',rev:'.$topmsg['content']);
		    $content = '这是一条Wechatext发出的测试微信';
		    $imgdata = file_get_contents('http://github.global.ssl.fastly.net/images/modules/dashboard/bootcamp/octocat_fork.png');
		    $img = '../data/send.png';
		    file_put_contents($img,$imgdata);
		    //上传图片
		    $fileid = $wechat->uploadFile($img);
		    echo 'fileid:'.$fileid;
		    //if ($fileid) $re = $wechat->sendImage($user['id'],$fileid);
		    //发送图文信息
		    $re = $wechat->sendPreview($userdata['user_name'],$content,$content,$content,$fileid,'http://github.com/dodgepudding/wechat-php-sdk');
		    var_dump($re);
		    //发送视频
		    //$re = $wechat->sendVideo($user['id'],$fileid);
			$re = $wechat->getFileList(2,0,10);
			var_dump($re);
		} else {
			echo 'no top msg';
		}	
	} else {
		echo "login error";
	}