<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/11 17:37
 * @Description: 描述
 */

namespace Sadmin\Controller;


use Common\Controller\BaseController;
use Think\Controller;

class UserController extends BaseController
{
    protected $userModel;
    protected $subUserModel;
    protected $messageModel;
    protected $result;

    /**
     *加载用户管理页面
     */
    public function index(){
        $this->display('userList');
    }

    /**
     *保存用户协议(文件形式)
     */
    public function saveUserAgreement(){
        $content = base64_encode(I('post.content'));
        $textUrl = "./Application/Sadmin/View/User/useragreement.txt";
        $file = fopen($textUrl,"w+");
        $result = fwrite($file,$content);
        fclose($file);
        if($result){
            $this->success('保 存 成 功');
            exit();
        }else{
            $this->error('保 存 失 败');
            exit();
        }
    }

    /**
     * 加载用户协议
     * @Author: ludezh
     */
    public function userAgreement(){
        $textUrl = "./Application/Sadmin/View/User/useragreement.txt";
        if(file_exists($textUrl)){
            $file = fopen($textUrl,"r");
//            if(!feof($file)){
                $textContent1 = fgets($file);
                $textContent = base64_decode($textContent1);
//            echo $textContent1;exit;
                fclose($file);
//            }
        }else{
            $textContent = "";
        }
        echo '<span style="color: white">dd</span>';
        $this->assign("textContent",html_entity_decode($textContent));
        $this->display();
    }

    /**
     *加载待处理用户页面(等待确认是否聘任)
     */
    public function waitIndex(){
        $this->display();
    }

    /**
     *ajax加载用户列表
     */
    public function userList(){
        $data['draw'] = I('get.draw');
        $start = I('get.start');        //起始条数
        $limit = I('get.length');       //每页条数
        $extraSearch = I('get.extraSearch');   //关键字查询(手机号/用户名/标题)
        $isDefriend = intval($extraSearch[0]);      //是否禁用
//        echo json_encode($isDefriend);exit();
        $keyword = $extraSearch[1];         //关键字
        $this->userModel = D('User/User');
        $this->result = $this->userModel->getUserAllList($start,$limit,$isDefriend,$keyword);
        if(!empty($this->result['list'])){
            foreach($this->result['list'] as $k => $v){
                $data['data'][$k] = array(
                    $v['id'],
                    $v['uid'],
                    $v['phone'],
                    $v['username'],
                    $v['alias'],
                    $v['email'],
                    $v['sex'],
                    $v['address'],
                    $v['registertime'],
                    $v['isdefriend'],
                );
            }
        }else{
            $data['data'] = array();
        }
        $data['recordsTotal'] = $this->result['count'];    //必须
        $data['recordsFiltered'] = $this->result['count']; //必须
        echo str_replace("\\/", "/",  json_encode($data)); exit();
    }

    /**
     *ajax加载待处理用户列表
     */
    public function waitUserList(){
        $this->userModel = D('User/User');
        $status = 10086;
        $this->result = $this->userModel->getUserList($status);
        $this->assign('userList',$this->result);
    }

    /**
     *是否拉黑用户
     */
    public function isDefriend(){
        $uid = I('post.uid');
        $phone = I('post.phone');
        if(!empty($uid) && !empty($phone)){
            $status = I('post.status');
            $this->userModel = D('User/User');
            $this->result = $this->userModel->manageUser($uid,$phone,$status);
            if($this->result){
                $this->success('操 作 成 功');
                exit();
            }else{
                $this->error('操 作 失 败');
                exit();
            }
        }
    }

    /**
     *恢复白名单用户
     */
    public function whiteList(){
        $uid = I('post.uid');
        $phone = I('post.phone');
        if(!empty($uid) && !empty($phone)){
            $this->userModel = D('User/User');
            $isDeFriend = 21;
            $this->result = $this->userModel->manageUser($uid,$phone,$isDeFriend);
            if($this->result){
                $this->success('成功恢复白名单');
                exit();
            }else{
                $this->error('恢复白名单失败');
                exit();
            }
        }
    }

    /**
     *最终确认聘任(添加子帐号)
     */
    public function agreeEmploy(){
        $uid = getRandStr(10);                  //生成用户uid
        $name = I('post.username');
        $password = md5('123456');
        $email = I('post.email');
        $registerTime = date('Y-m-ewew H:i:s');
        $address = I('post.address');
        $phone = I('post.phone');
        $roleId = I('post.roleId');
        $typeId = I('post.typeId');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $this->subUserModel = D('User/SubUser');
            $this->result = $this->subUserModel->addUser($uid,$name,$password,$email,$registerTime,$address,$phone,$roleId,$typeId);
            if($this->result){
                $result = $this->sureEmployUser($name);
                if($result){
                    $this->success('成功聘任');
                    exit();
                }else{
                    $this->subUserModel->delUser($uid,$phone);
                    $this->error('聘任消息发送失败');
                    exit();
                }
            }else{
                $this->error('聘任失败');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }
    }

    /**
     *最终确认发送聘任消息
     */
    public function sureEmployUser($name){
        $title = '【系统消息】面试终极结果';
        $content = '<p>亲爱的'.$name.'同学：<br/><p style="text-indent:2em;">恭喜您通过了终极面试，请尽快到人事部报到！</p></p>';
        $pushTime = date('Y-m-ewew H:i:s');
        $outTime = I('post.outTime');
        $uid = I('post.uid');
        if($uid){
            $this->messageModel = D('User/Message');
            $this->result = $this->messageModel->addMessage($uid,$title,$content,$pushTime,$outTime);
            if($this->result){
                return true;
            }else{
               return false;
            }
        }else{
            return false;
        }
    }

}