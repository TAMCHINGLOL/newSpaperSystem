<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/12 0:42
 * @Description: 描述
 */

namespace Admin\Controller;


use Think\Controller;

class MessageController extends Controller
{
    protected $userModel;
    protected $messageModel;
    protected $result;


    /**
     *发送聘任消息
     */
    public function employUser(){
        $title = I('post.title');
        $content = I('post.content');
        $pushTime = date('Y-m-ewew H:i:s');
        $outTime = I('post.outTime');
        $uid = I('post.uid');
        if($uid){
            $this->messageModel = D('User/Message');
            $this->result = $this->messageModel->addMessage($uid,$title,$content,$pushTime,$outTime);
            if($this->result){
                $this->userModel = D('User/User');
                $result = $this->userModel->updateUserStatus($uid,10086);
                if($result){
                    $this->success('发送成功');
                    exit();
                }else{
                    $this->error('修改用户状态失败');
                    exit();
                }
            }else{
                $this->error('发送失败');
                exit();
            }
        }else{
            $this->error('用户不存在');
            exit();
        }
    }

    /**
     *取消聘任
     */
    public function cancelEmploy(){
        $uid = I('post.uid');
        $name = I('post.userName');
        $title = '【系统消息】面试终极结果';
        $content = '<p>亲爱的'.$name.'同学：<br/><p style="text-indent:2em;">很遗憾您未能通过终极面试，希望您再接再厉，我们期待您的下次到来！</p></p>';
        $pushTime = date('Y-m-ewew H:i:s');
        $cancelTime = I('post.outTime');
        $outTime = $cancelTime.' 23:59:59';
        $this->messageModel = D('User/Message');
        $this->result = $this->messageModel->addMessage($uid,$title,$content,$pushTime,$outTime);
        if($this->result){
            $this->userModel = D('User/User');
            $result = $this->userModel->updateUserStatus($uid,1);
            if($result){
                $this->success('成功取消');
                exit();
            }else{
                $this->error('修改用户状态失败');
                exit();
            }
        }else{
            $this->error('取消失败');exit();
        }
    }
}