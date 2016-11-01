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
        $lost = M('lost');
        if ($lost -> add($data)){
            echo "成功";
        }else 
            echo "失败";
    }
}

?>