<?php
namespace Home\Controller;
use Common\Controller\CommonController;
use Think\Controller;

class AllController extends CommonController {

    /**
     *加载论文分类
     */
    public function thesisclassify(){
        $this->display();
    }

    /**
     *加载论文展示
     */
    public function thesisshow(){
        $this->display();
    }

}
?>