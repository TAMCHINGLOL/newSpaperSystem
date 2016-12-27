<?php
namespace Sadmin\Controller;
use Think\Controller;
class IndexController extends Controller {

    /**
     * 退出登录
     * @Author: ludezh
     */
    public function exitLogin(){
        session(null);
        $this->success('成 功 退 出 , 请 重 新 登 录');
        exit();
    }

    /**
     * 加载修改密码页面
     * @Author: ludezh
     */
    public function passwordEdit(){
        $this->display();
    }

    /**
     *加载登录首页
     */
    public function login(){
        $this->display();
    }

    /**
     *加载后台首页
     */
    public function index(){
        $adminModel = D('User/Admin');
        $info = $adminModel->findRowByUserName(session('adminTag'));
        $this->assign('info',$info);
        $this->display();
    }

    /**
     *管理员登录
     */
    public function loginUrl(){
        $phone = I('post.phone');
        $name = I('post.name');
        $password = I('post.password'); //前端需加密一次
        $adminModel = D('User/Admin');
        if(empty($phone)){
            $rs = $adminModel->loginByUserName($name);      //用户名登录
            if($rs['password'] == md5($password)){
                session('adminTag',$rs['username']);
                session('adminuid',$rs['uid']);
                $this->success('登 录 成 功 , 正 在 跳 转 ...');
                exit();
            }else{
                $this->error('密码错误');
                exit();
            }
        }else if(empty($name)){
            $rs = $adminModel->loginByPhone($phone);        //手机号登录
            if($rs['password'] == $password){
                session('adminTag',$rs['username']);
                $this->success('登录成功');
                exit();
            }else{
                $this->error('密码错误');
                exit();
            }
        }
    }

    /**
     *修改密码
     */
    public function updatePassword(){
        $oldPwd = I('post.oldPwd');
        $newPwd = I('post.newPwd');
        $adminModel = D('User/Admin');
        $userName = session('adminTag');
        $rs = $adminModel->findRowByUserName($userName);
        if($rs['password'] == $oldPwd){
            if($oldPwd != $newPwd){
                $rs2 = $adminModel->update($userName,$newPwd);
                if($rs2){
                    $this->success('修改成功');
                    exit();
                }else{
                    $this->error('修改失败');
                    exit();
                }
            }else{
                $this->error('请输入新密码');
                exit();
            }
        }else{
            $this->error('旧密码错误');
            exit();
        }
    }
}