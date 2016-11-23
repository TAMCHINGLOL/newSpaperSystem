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
     *加载账号安全页面
     */
    public function accountsafety()
    {
        $this->display();
    }	
    /**
     *加载消息设置页面
     */
    public function messageset()
    {
        $this->display();
    }		
	
	
	
	
	
    /**
     *加载个人主页页面
     */
    public function index()
    {
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if ($sysTag == 'admin') {
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        } else {
            $userModel = D('User/User');
            $info = $userModel->getRowByUid($uid);
        }
        $this->assign('info', $info);
        $this->assign('sysTag', $sysTag);
        $this->display();
    }

    /**
     *加载消息通知页面
     */
    public function message()
    {
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if ($sysTag == 'admin') {
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        } else {
            $userModel = D('User/User');
            $info = $userModel->getRowByUid($uid);
        }
        $this->assign('info', $info);
        $this->display();
    }

    /**
     *加载账号设置页面
     */
    public function account()
    {
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if ($sysTag == 'admin') {
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        } else {
            $userModel = D('User/User');
            $info = $userModel->getRowByUid($uid);
        }
        $this->assign('info', $info);
        $this->display();
    }

    /**
     *修改基本信息
     */
    public function updateAccount(){
        $uname = trim(I('get.uname'));            //昵称
        $truename = trim(I('get.truename'));      //用户名
        $gender = trim(I('get.gender'));          //性别
        $birthday = trim(I('get.birthday'));      //出生日期
        $cityname = trim(I('get.cityname'));      //居住地
        $description = trim(I('get.description'));//个人简介

        $data = array(
            'alias' => $uname,
            'birthday' => $birthday,
            'backup' => $description,
            'sex' => $gender,
            'address' => $cityname,
            'username' => $truename
        );
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if($sysTag == 'admin'){
            $subUserModel = D("User/SubUser");
            $result = $subUserModel->updateRowByUid($uid,$data);
        }else{
            $userModel = D("User/User");
            $result = $userModel->updateRowByUid($uid,$data);
        }

        if($result){
            $this->success('修 改 成 功');
            exit();
        }else{
            $this->error('没有任何修改');
            exit();
        }
    }

    /**
     *手机号绑定/修改
     */
    public function bindPhone(){
        $code = I('post.code');
        $verifyCode = session('smsCode');
        if($code != md5($verifyCode)){
            $this->error('验证码不正确');
            exit();
        }
        $phone = I('post.phone');
        if(preg_match("/^1[34578]{1}\d{9}$/", $phone)){
            $uid = session('uid');
            $sysTag = session('sys_tag');
            if($sysTag == 'admin'){
                $subUserModel = D("User/SubUser");
                $isBind = $subUserModel->getRowByPhone($phone);
                if($isBind){
                    $this->error('该手机号码已经被占用');
                    exit();
                }
                $result = $subUserModel->updatePhoneByUid($phone,$uid);
            }else{
                $userModel = D("User/User");
                $isBind = $userModel->getRowByPhone($phone);
                if($isBind){
                    $this->error('该手机号码已经被占用');
                    exit();
                }
                $result = $userModel->updatePhoneByUid($phone,$uid);
            }

            if($result){
                $this->success('绑 定 成 功');
                exit();
            }else{
                $this->error('请不要重复绑定该邮箱');
                exit();
            }
        }else{
            $this->error('手机号不正确');
            exit();
        }
    }

    /**
     *邮箱绑定/修改
     */
    public function bindEmail(){
        $email = I('post.email');
        if(preg_match('/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/',$email)){
            $uid = session('uid');
            $sysTag = session('sys_tag');
            if($sysTag == 'admin'){
                $subUserModel = D("User/SubUser");
                $isBind = $subUserModel->getRowByEmail($email);
                if($isBind['email'] == $email){
                    $this->error('该邮箱已经被占用');
                    exit();
                }
                $result = $subUserModel->updateEmailByUid($email,$uid);
            }else{
                $userModel = D("User/User");
                $isBind = $userModel->getRowByEmail($email);
                if($isBind == $email){
                    $this->error('该邮箱已经被占用');
                    exit();
                }
                $result = $userModel->updateEmailByUid($email,$uid);
            }
            if($result){
                $this->success('绑 定 成 功');
                exit();
            }else{
                $this->error('请不要重复绑定该邮箱');
                exit();
            }
        }else{
            $this->error('邮箱格式不正确');
            exit();
        }
    }

    /**
     *修改密码
     */
    public function updatePassword(){
        $uid = session('uid');
        $sysTag = session('sys_tag');
        if($sysTag == 'admin'){
            $model = D('User/SubUser');
        }else{
            $model = D('User/User');
        }
        $row = $model->getRowByUid($uid);
        $oldPwd = I('post.oldPwd');
        $newPwd = I('post.newPwd');
        if ($oldPwd != $newPwd) {
            $pwd1 = md5($oldPwd);
            if ($pwd1 == $row['password']) {
                $pwd2 = md5($newPwd);
                $result = $model->updatePassword1($uid, $pwd2);
                if ($result) {
                    session(null);
                    $this->success('修改成功 , 请重新登录');
                    exit();
                } else {
                    $this->error('修 改 失 败');
                    exit();
                }
            } else {
                $this->error('旧 密 码 错 误');
                exit();
            }
        } else {
            $this->error('两次密码相同,请重新输入');
            exit();
        }
    }
}