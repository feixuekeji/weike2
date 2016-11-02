<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 
 * @author waxiongfeifei@gmail.com
 *
 */
class IndexController extends Controller {
    public function index(){
        $openid = I('get.openid');
        session('openid',$openid);
        $this->display();
    }
}