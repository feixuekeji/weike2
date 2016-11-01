<?php
/*生成自定义菜单开始*/
    $xjson = '{ 
     "button":[
         {
               "name":"篮球",
               "sub_button":[
                    {
                       "type":"click",
                       "name":"nba",
                       "key":"V1001_NBA"
                    },
                    {
                       "type":"click",
                       "name":"cba",
                       "key":"V1001_CBA"
                    }
                ]
           },
           {
               "name":"体育",
               "sub_button":[
                    {
                       "type":"click",
                       "name":"足球",
                       "key":"V1001_ZUQIU"
                    },
                    {
                       "type":"click",
                       "name":"排球",
                       "key":"V1001_PAIQIU"
                    },
                    {
                       "type":"click",
                       "name":"网球",
                       "key":"V1001_WANGQIU"
                    },
                    {
                       "type":"click",
                       "name":"乒乓球",
                       "key":"V1001_PPQ"
                    },
                    {
                       "type":"click",
                       "name":"台球",
                       "key":"V1001_TAIQIU"
                    }
                ]
           },
           {
               "name":"新闻",
               "sub_button":[
                    {
                       "type":"click",
                       "name":"国内新闻",
                       "key":"V1001_GNNEWS"
                    },
                    {
                       "type":"click",
                       "name":"国际新闻",
                       "key":"V1001_GJNEWS"
                    },
                    {
                       "type":"click",
                       "name":"地方新闻",
                       "key":"V1001_AREANEWS"
                    },
                    {
                       "type":"click",
                       "name":"家庭新闻",
                       "key":"V1001_HOMENEWS"
                    }
                ]
           }
       ]
    }';
    $jsonMenu = json_encode($xjson);
    $get_url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx90f5244f007902e1&secret=c27d95de78d69194f7b0dc606e86d96c';
    $get_return = file_get_contents($get_url);
    $get_return = (array)json_decode($get_return);
    if( !isset($get_return['access_token']) ){exit( '获取access_token失败！' );}
    $post_url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$get_return['access_token'];
    $ch = curl_init($post_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS,$xjson);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($xjson))
    );
    $respose_data = curl_exec($ch);
    echo $respose_data;exit;
/*生成自定义菜单结束*/
?>