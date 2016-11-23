<?php
namespace Home\Controller;
use Think\Controller;

class WriterController extends Controller {

    /**
     *加载我的论文
     */
    public function mythesis(){
        $this->display();
    }

    /**
     *加载论文编辑
     */
    public function editthesis(){
        $this->display();
    }
    
    /**
     *加载添加论文
     */
    public function addthesis(){
        $this->display();
    }
    
    /**
     *加载未投递论文
     */
    public function nodeliver(){
        $this->display();
    }
    
    /**
     *加载已投递论文
     */
    public function delivered(){
        $this->display();
    }
    
    /**
     *加载已投递论文
     */
    public function new_file(){
        $this->display();
    }
    
}