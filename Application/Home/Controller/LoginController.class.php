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
     *加载登录页面
     */
    public function index()
    {
        if (session('uid') != null && isset($_SESSION['uid'])) {
            $this->redirect('/Home/Index/Index');
        }
        $this->display();
    }

    /**
     *加载注册页面
     */
    public function register()
    {
        $this->display();
    }


    /**
     *用户登录
     */
    public function login()
    {
        if (session('isVerify') == 'no' || !isset($_SESSION['isVerify'])) {
            $this->error('请 重 新 输 入 验 证 码');
            exit();
        }

        $phone = I('post.phone');
        $username = I('post.username');
        $password = I('post.password');
        $pwd = md5($password);              //加密两次密码
        $userTag = I('post.userTag');
        if ($userTag == 'author') {         //笔者登录
            $userModel = D('User/User');
            if (!empty($phone)) {
                $returnResult = $userModel->login($phone);
            }
            if (!empty($username)) {
                $returnResult = $userModel->loginName($username);
            }
        } else {
            $this->error('非法操作,未知用户类型');
            exit();
        }

        if ($returnResult['isdefriend'] == 2) {
            $this->error('你已被管理员拉黑,请联系管理员');
            exit();
        }
        if (empty($returnResult)) {
            $this->error("用户不存在");
            exit();
        }
        if ($returnResult['password'] == $pwd) {

            session('sys_tag', 'author');
            session('phone', $phone);
            sessionSave($returnResult);
            session('password', null);
            $data['status'] = 1;
            $data['info'] = '登录成功';
//                $data['count'] = $countRow;
            echo json_encode($data);
            exit();
        } else {
            $this->error('密码错误');
            exit();
        }

    }

    /**
     *图片验证码生成
     */
    public function verify()
    {
        session('isVerify', null);
        makeVerify();
    }

    /**
     *验证码验证
     */
    public function verifyCode()
    {
        $code = I('post.code');      //验证码
        if (empty($code)) {
            $this->error('验证码为空');
            exit();
        }
        if (!checkVerify($code)) {
            session("isVerify", 'no');
            $_SESSION['isVerify'] = 'no';
            $this->error('验证码不正确');
            exit();
        }else{
            session('isVerify','yes');
        }
        $this->success('验 证 码 正 确');
        exit();
    }

    /**
     *获取短信验证码
     */
    public function getSms()
    {
        if (session('isVerify') == 'no' && isset($_SESSION['isVerify'])) {
            $this->error('请重新输入验证码');
            exit();
        }

        $phone = I('post.phone');
        if (preg_match("/^1[34578]{1}\d{9}$/", $phone)) {
            $tag = I('post.tag');
            if ($tag == 'Index') {
                $userSubModel = D('User/SubUser');
                $returnResult = $userSubModel->getRowByPhone($phone);
                if (empty($returnResult)) {
                    $this->error('用户不存在');
                    exit();
                }
            }
            $smsCode = makeSmsCode();
            $data = array($smsCode, '2');
            $tempId = "1";
            $rs = sendTemplateSMS($phone, $data, $tempId);
            if ($rs == 'successSms') {
                session('smsCode', $smsCode);
                $this->success('短 信 发 送 中...');
                exit();
            } else {
                $this->error('小 编 正 在 抢 修 基 站');
                exit();
            }
        } else {
            $this->error('手机号不正确');
            exit();
        }

    }

    /**
     *验证手机验证码(管理员登录)
     */
    public function verifySms()
    {
        if (session('isVerify') == 'no' || !isset($_SESSION['isVerify'])) {
            $this->error('请 重 新 输 入 验 证 码');
            exit();
        }

        $smsCode = I('post.smsCode');
        $sureSms = session('smsCode');
        if($smsCode == md5('')){
            $this->error('请输入动态码');
            exit();
        }
        if ($smsCode == md5($sureSms)) {
            $phone = I('post.phone');
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->login($phone);
            if (empty($info)) {
                $this->error('用户不存在');
                exit();
            }
            if ($info['isdefriend'] == 2) {
                $this->error('你已被管理员禁用,请联系管理员');
                exit();
            }
            sessionSave($info);
            if(session('roleid') == 3 || session('roleid') == 6){
                session('sys_tag', 'admin');
            }
            session('smsCode',null);
            $this->success('动态码正确');
            exit();
        } else {
            $this->error('动态码不正确');
            exit();
        }
    }

    /**
     *忘记密码
     */
    public function findPassword()
    {
        $phone = I('post.phone');
        $userModel = D('User/User');
        $phoneRow = $userModel->getRowByPhone($phone);
        if (!$phoneRow) {
            $this->error('手机号不存在');
            exit();
        }

        $uid = session('uid');
        $oldPwd = I('post.oldPwd');
        $newPwd = I('post.newPwd');
        if ($oldPwd != $newPwd) {
            $pwd1 = md5($oldPwd);
            if ($pwd1 != $phoneRow['password']) {
                $pwd2 = md5($newPwd);
                $result = $userModel->updatePassword($uid, $phone, $pwd2);
                if ($result) {
                    $this->success('修改成功');
                    exit();
                } else {
                    $this->error('修改失败');
                    exit();
                }
            } else {
                $this->error('旧密码错误');
                exit();
            }
        } else {
            $this->error('请输入新的密码');
            exit();
        }
    }

    /**
     *笔者用户注册
     */
    public function registerNew()
    {
        $smsCode = I('post.smsCode');
        $sureSms = session('smsCode');
//        if ($smsCode != md5($sureSms)) {
//            $this->error('动态码不正确');
//            exit();
//        }

        $phone = I('post.phone');
        if (preg_match("/^1[34578]{1}\d{9}$/", $phone)) {
            $userModel = D('User/User');
            $phoneRow = $userModel->getRowByPhone($phone);
            if ($phoneRow) {
                $this->error('手机号已被注册');
                exit();
            }
            $password = I('post.password');
            $pwd = md5($password);              //用户密码
            $uid = getRandStr(8);               //生成用户id
            $alias = getRandStr(11);            //生成用户名
            $result = $userModel->register($uid, $phone, $pwd, $alias);
            if ($result) {
                $this->success(' 注 册 成 功 , 赶 紧 上 车');
                exit();
            } else {
                $this->error('注册失败');
                exit();
            }
        } else {
            $this->error('手机号有误');
            exit();
        }
    }

}