<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//添加页面
    public function index()
    {
    	$this->display();
    }
    public function add(){ 
    	$data = I('post.');
    	$last = M('text')->add($data);
    	if($last){
    		$this->success('添加成功',U('Index/show'),2);
    	}else{
    		$this->error('添加失败');
    	}
    }
    //展示页面
    public function show(){
    	$this->assign('data',M('text')->select());
    	$this->display();
    }
    //删除页面
    public function del(){
    	$id = I('get.id');
    	$res = M('text')->delete($id);
    	if($res){
    		$this->success('删除成功',U('Index/show'),2);
    	}else{
    		$this->error('删除失败');
    	}
    }
    //修改页面
    public function updata(){
    	$id = I('get.id');
    	$this->assign('v',M('text')->where("id=$id")->find());
    	$this->display();
    }
    //修改页面
    public function do_updata(){
    	$id=I('post.id');
    	if(M('text')->where("id=$id")->save(I('post.'))){
    	$this->success('修改成功',U('Index/show'),2);
    	}else{
    		$this->error('修改失败');
    	}
    }
}
