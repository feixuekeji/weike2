<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 
 * @author feifei
 *
 */
class LostController extends Controller
{
    function addLost()
    {
        $data = I('post.');
        $data['openid'] = session('openid');
        $data['pub_time'] = time();
        $lost = M('lost');
        if ($lost -> add($data)){
            echo "成功";
        }else 
            echo "失败";
    }
}

?>