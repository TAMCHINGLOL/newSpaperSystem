<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/13 22:50
 * @Description: 描述
 */

namespace Admin\Controller;


use Think\Controller;

class NoticeController extends Controller
{
    protected $noticeModel;
    protected $result;

    /**
     *加载公告页面
     */
    public function index(){
        $this->display();
    }

    /**
     *ajax在家公告列表
     */
    public function noticeList(){
        $this->noticeModel = D('Common/Notice');
        $this->result = $this->noticeModel->getAllRow();
        $this->assign('noticeList',$this->result);
    }

    /**
     *添加公告
     */
    public function add(){
        $nid = getRandStr(6);               //生成公告编号
        $title = I('post.title');
        $content = I('post.content');
        $pushTime = date('Y-m-ewew H:i:s');
        $cancelTime = I('post.outTime');
        $outTime = $cancelTime.' 23:59:59';
        $isSend = I('post.isSend');
        $status = I('post.status');
        $this->result = $this->noticeModel->addRow($nid,$title,$content,$pushTime,$outTime,$isSend,$status);
        if($this->result && $status == 2){
            $this->success('操作成功');
            exit();
        }else{
            $this->error('操作失败');
            exit();
        }
    }

    /**
     *更新公告
     */
    public function update(){
        $nid = I('post.nid');
        $title = I('post.title');
        $content = I('post.content');
        $pushTime = date('Y-m-ewew H:i:s');
        $cancelTime = I('post.outTime');
        $outTime = $cancelTime.' 23:59:59';
        $isSend = I('post.isSend');
        $status = I('post.status');
        $this->result = $this->noticeModel->updateRow($nid,$title,$content,$pushTime,$outTime,$isSend,$status);
        if($this->result && $status == 2){
            $this->success('操作成功');
            exit();
        }else{
            $this->error('操作失败');
            exit();
        }
    }

    /**
     *删除公告
     */
    public function delete(){
        $nid = I('post.nid');
        $this->noticeModel = D('Common/Notice');
        $this->result = $this->noticeModel->delRow($nid);
        if($this->result){
            $this->success('删除成功');
            exit();
        }else{
            $this->error('删除失败');
            exit();
        }
    }
}