<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/11 12:22
 * @Description: 描述
 */

namespace Admin\Controller;


use Think\Controller;

class SubUserController extends Controller
{
    protected $subUserModel;
    protected $result;

    /**
     *加载用户列表首页
     */
    public function index(){
        $this->display();
    }

    /**
     *ajax获取用户列表
     */
    public function userList(){
        $this->subUserModel = D('User/SubUser');
        $this->result = $this->subUserModel->getUserList();
        $this->assign('userList',$this->result);
    }

    /**
     *添加子帐号
     */
    public function addUser(){
        $uid = getRandStr(10);                  //生成用户uid
        $name = I('post.username');
        $password = md5('123456');
        $email = I('post.email');
        $registerTime = date('Y-m-d H:i:s');
        $address = I('post.address');
        $phone = I('post.phone');
        $roleId = I('post.roleId');
        $typeId = I('post.typeId');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $this->subUserModel = D('User/SubUser');
            $this->result = $this->subUserModel->addUser($uid,$name,$password,$email,$registerTime,$address,$phone,$roleId,$typeId);
            if($this->result){
                $this->success('添加成功');
                exit();
            }else{
                $this->error('添加失败');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }
    }

    /**
     *修改子账号
     */
    public function updateUser(){
        $uid = I('post.uid');
        $name = I('post.username');
        $email = I('post.email');
        $registerTime = date('Y-m-d H:i:s');
        $address = I('post.address');
        $phone = I('post.phone');
        $roleId = I('post.roleId');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $this->subUserModel = D('User/SubUser');
            $this->result = $this->subUserModel->updateUser($uid,$name,$email,$registerTime,$address,$phone,$roleId);
            if($this->result){
                $this->success('修改成功');
                exit();
            }else{
                $this->error('修改失败');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }
    }

    /**
     *删除子帐号
     */
    public function deleteUser(){
        $uid = I('post.uid');
        $phone = I('post.phone');
        if(!empty($uid) && !empty($phone)){
            $this->result = $this->subUserModel->delUser($uid,$phone);
            if($this->result){
                $this->success('删除成功');
                exit();
            }else{
                $this->error('删除失败');
                exit();
            }
        }else{
            $this->error('用户信息不合法');
            exit();
        }
    }

}