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
        $data = I('get.');
        //$data['password'] = md5($data['password']);
        $admin = M('admin')->where($data)->find();
        if (!empty($admin)){
            session('admin',$admin['username']);
            redirect(U('Admin/admin','',false,true));
        }else {
            $this->error('用户名或密码有误','index',1);
        }
    }
    
    /**
     * 
     */
    public function logout()
    {
        session('admin',null);
        redirect(U('Admin/index','',false,true));
    }
    
    public function delete()
    {
        $id = I("get.find_id")?("get.find_id"):("get.lost_id");
        $type = I('get.type');
        if($type == "F"){
            
        }
    }
    
}
?>