<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    /**
     *加载首页
     */
    public function index(){
        $this->display();
    }

    /**
     *退出登录
     */
    public function exitLogin(){
        session(null);
        $this->redirect('Home/Index/index');
    }
}