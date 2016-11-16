<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/11/16 16:17
 * @Description: 描述
 */

namespace Home\Controller;


use Common\Controller\CommonController;
use Think\Controller;

class PersonController extends CommonController
{
    /**
     *加载个人主页页面
     */
    public function index(){
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if($sysTag == 'admin'){
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        }else{
            $userModel = D('User/User');
            $info = $userModel->getRowByUid($uid);
        }
        $this->assign('info',$info);
        $this->assign('sysTag',$sysTag);
        $this->display();
    }

    /**
     *加载消息通知页面
     */
    public function message(){
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if($sysTag == 'admin'){
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        }else{
            $userModel = D('User/User');
            $info = $userModel->getRowByUid($uid);
        }
        $this->assign('info',$info);
        $this->display();
    }

    /**
     *加载账号设置页面
     */
    public function account(){
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if($sysTag == 'admin'){
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        }else{
            $userModel = D('User/User');
            $info = $userModel->getRowByUid($uid);
        }
        $this->assign('info',$info);
        $this->display();
    }
}