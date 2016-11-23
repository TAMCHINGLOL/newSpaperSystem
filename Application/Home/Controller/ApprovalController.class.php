<?php
namespace Home\Controller;
use Think\Controller;

class ApprovalController extends Controller {

    /**
     *加载论文分类
     */
    public function approvalfirst(){
        $this->display();
    }

    /**
     *加载论文展示
     */
    public function approvalsecond(){
        $this->display();
    }

}
?>