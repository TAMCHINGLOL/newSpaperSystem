<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/9 20:54
 * @Description: 描述
 */

namespace Home\Controller;


use Think\Controller;

class LoginController extends Controller
{

    /**
     *用户登录
     */
    public function login(){
        $phone = I('post.phone');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $password = I('post.password');
            $pwd = md5($password);                          //加密密码
            $userTag = I('post.userTag');
            $messageModel = D('User/Message');

            if($userTag == 'author'){                       //笔者登录
                $userModel = D('User/User');
                $returnResult = $userModel->login($phone);
                $countRow = $messageModel->getMessageCount($returnResult['uid']);
            }else if($userTag == 'subUser'){                //子帐号管理员登录
                $subUserModel = D('User/SubUser');
                $returnResult = $subUserModel->login($phone);
                $countRow = $messageModel->getMessageCount($returnResult['uid']);
            }else{
                $this->error('未知用户类型');
                exit();
            }

            if($returnResult['isdefriend'] == 12){
                $this->error('你已被管理员拉黑,请联系管理员');
                exit();
            }

            if($returnResult['password'] == $pwd){
                session('uid',$returnResult['uid']);
                session('phone',$phone);
                $data['status'] = 1;
                $data['info'] = '登录成功';
                $data['count'] = $countRow;
                echo json_encode($data);
                exit();
            }else{
                $this->error('密码错误');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }

    }

    /**
     *获取短信验证码
     */
    public function getSms(){
        $phone = I('post.phone');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $smsCode = makeSmsCode();
            $data = array($smsCode, '2');
            $tempId = "1";
            $rs = sendTemplateSMS($phone,$data,$tempId);
            if($rs == 'successSms'){
                session('smsCode',$smsCode);
                $this->success('发送成功');
                exit();
            }else{
                $this->error('发送失败');
                exit();
            }

        }else{
            $this->error('手机号有误');
            exit();
        }

    }

    /**
     *验证手机验证码
     */
    public function verifySms(){
        $smsCode = I('post.smsCode');
        $sureSms = session('smsCode');
        if($smsCode == $sureSms){
            $this->success('验证码正确');
            exit();
        }else{
            $this->error('验证码错误');
            exit();
        }
    }

    /**
     *修改密码(忘记密码)
     */
    public function updatePassword(){
        $phone = I('post.phone');
        $userModel = D('User/User');
        $phoneRow = $userModel->getRowByPhone($phone);
        if(!$phoneRow){ $this->error('手机号不存在'); exit(); }

        $uid = session('uid');
        $oldPwd = I('post.oldPwd');
        $newPwd = I('post.newPwd');
        if($oldPwd != $newPwd){
            $pwd1 = md5($oldPwd);
            if($pwd1 != $phoneRow['password']){
                $pwd2 = md5($newPwd);
                $result = $userModel->updatePassword($uid,$phone,$pwd2);
                if($result){
                    $this->success('修改成功');
                    exit();
                }else{
                    $this->error('修改失败');
                    exit();
                }
            }else{
                $this->error('旧密码错误');
                exit();
            }
        }else{
            $this->error('请输入新的密码');
            exit();
        }
    }

    /**
     *笔者用户注册
     */
    public function register(){
        $phone = I('post.phone');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $userModel = D('User/User');
            $phoneRow = $userModel->getRowByPhone($phone);
            if($phoneRow){ $this->error('手机号已被注册'); exit(); }
            $password = I('post.password');
            $pwd = md5($password);              //用户密码
            $uid = getRandStr(8);               //生成用户id
            $name = $phone;
            $result = $userModel->register($uid,$phone,$pwd,$name);
            if($result){
                $this->success('注册成功');
                exit();
            }else{
                $this->error('注册失败');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }
    }

}