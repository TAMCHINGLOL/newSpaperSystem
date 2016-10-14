<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/10 0:31
 * @Description: 描述
 */

namespace Home\Controller;

use Think\Controller;

class SubUserController extends Controller
{
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
     *修改密码
     */
    public function updatePassword(){
        $phone = I('post.phone');
        $subUserModel = D('User/SubUser');
        $phoneRow = $subUserModel->getRowByPhone($phone);
        if(!$phoneRow){ $this->error('手机号不存在'); exit(); }

        $uid = session('uid');
        $oldPwd = I('post.oldPwd');
        $newPwd = I('post.newPwd');
        if($oldPwd != $newPwd){
            $pwd1 = md5($oldPwd);
            if($pwd1 != $phoneRow['password']){
                $pwd2 = md5($newPwd);
                $result = $subUserModel->updatePassword($uid,$phone,$pwd2);
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
}