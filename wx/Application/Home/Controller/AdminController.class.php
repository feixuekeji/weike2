<?php
namespace Home\Controller;

use Think\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $this->display();
    }
    
    public function login()
    {
        $data = I('post.');
        $data['password'] = md5($data['password']);
        $admin = M('admin')->where($data)->find();
    }
    
}
?>