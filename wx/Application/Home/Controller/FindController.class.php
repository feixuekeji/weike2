<?php
namespace Home\Controller;
use Think\Controller;

class FindController extends Controller{
    public function index(){
        $this->display();
      
    }
    public function addFind()
    {
        $data = I('post.');
        $find = M('find');
        $data['openid'] = session('openid');
        $data['pub_time'] = time();
        if ($find -> add($data)){
            echo "成功";
        }else 
            echo "失败";
    }
    
    public function findList()
    {
        $find = M('find');
        $count      = $find->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $find->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('show',$show);
        $this->display(); 
        
        
    }
    
    //详细页
    public function getDetail()
    {
        $find_id = I('get.find_id');
        $find = M('find');
        $data = $find->where('find_id=$find_id')->find();
        $this->assign('data', $data);
        $this->display();
    }
}

?>