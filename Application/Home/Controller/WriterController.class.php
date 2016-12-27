<?php
namespace Home\Controller;
use Common\Controller\CommonController;
use Think\Controller;

class WriterController extends CommonController {

    /**
     * 加载某一文章详情
     * @Author: ludezh
     */
    public function article(){
        $artId = I('get.artId');
        $articleModel = D('User/Article');
        $userModel = D('User/User');
        $typeModel = D('Sadmin/Type');
        $selfTypeModel = D('Common/SelfType');
        $artInfo = $articleModel->findRow($artId);
        $artInfo['typename'] = $typeModel->getNameById($artInfo['typeid']);
        $userInfo = $userModel->getRowsByUid($artInfo['uid']);
        $artInfo['content'] = html_entity_decode($artInfo['content']);
        $selfInfo = $selfTypeModel->findRow($artInfo['uid'],$artInfo['self_typeid']);
        $this->assign('artInfo',$artInfo);
        $this->assign('userInfo',$userInfo);
        $this->assign('selfInfo',$selfInfo);
        $this->display();
    }

    /**
     *彻底删除论文
     */
    public function deleteArt(){
        $artId = I('post.artId');
        $uid =session('uid');
        if($artId){
            $articleModel = D('User/Article');
            $rs = $articleModel->delRow($uid,$artId,4);  //删除后跑到垃圾箱
            if($rs){
                $this->success('已 彻 底 删 除');
                exit();
            }else{
                $this->error('删 除 失 败');
                exit();
            }
        }else{
            $this->error('请选择删除的文章');
            exit();
        }
    }

    /**
     *恢复论文
     */
    public function returnArt(){
        $artId = I('post.artId');
        $uid =session('uid');
        if($artId){
            $articleModel = D('User/Article');
            $rs = $articleModel->delRow($uid,$artId,1);  //恢复后跑到草稿箱
            if($rs){
                $this->success('已 放 到 草 稿 箱');
                exit();
            }else{
                $this->error('恢 复 失 败');
                exit();
            }
        }else{
            $this->error('请选择恢复的文章');
            exit();
        }
    }

    /**
     *删除论文
     */
    public function delArt(){
        $artId = I('post.artId');
        $uid =session('uid');
        if($artId){
            $articleModel = D('User/Article');
            $rs = $articleModel->delRow($uid,$artId,3);  //删除后跑到垃圾箱
            if($rs){
                $this->success('已 扔 到 垃 圾 箱');
                exit();
            }else{
                $this->error('删 除 失 败');
                exit();
            }
        }else{
            $this->error('请选择删除的文章');
            exit();
        }
    }

    /**
     *投递论文
     */
    public function sureArt(){
        $artId = I('post.artId');
        $typeId = I('post.typeId');
        $uid =session('uid');
        if($artId){
            $articleModel = D('User/Article');
            $sendTime = date('Y-m-d H:i:s');
            $rs = $articleModel->sureRow($uid,$artId,2,$typeId,$sendTime,5,1);  //成功投递跑到投递箱
            if($rs){
                $this->success('投 递 成 功');
                exit();
            }else{
                $this->error('投 递 失 败');
                exit();
            }
        }else{
            $this->error('请选择投递的文章');
            exit();
        }
    }

    /**
     *取消投递
     */
    public function cancelArt(){
        $artId = I('post.artId');
        $uid = session('uid');
        if($artId){
            $articleModel = D('User/Article');
            $rs = $articleModel->cancelRow($uid,$artId,1,6);  //取消投递跑到草稿箱去
            if($rs){
                $this->success('成 功 取 消 投 递');
                exit();
            }else{
                $this->error('取 消 投 递 失 败');
                exit();
            }
        }else{
            $this->error('请选择投递的文章');
            exit();
        }
    }

    /**
     *ajax修改文章
     */
    public function updateRowThesis(){
        $artId = I('post.artId');
        $uid = session('uid');
        $title = I('post.title');
        $content = I('post.content');
        $typeId = I('post.typeId');
        $saveTime = date('Y-m-d H:i:s');
        $status = 1;
        $selfTypeId = I('post.selfTypeId');
        $tag = I('post.tag');
        $isOpen = I('post.isOpen');
        $isPass = 5;
        $articleModel = D('User/Article');
        $rs = $articleModel->updateRow($artId,$uid,$title,$content,$typeId,$saveTime,$status,$selfTypeId,$tag,$isOpen,$isPass);
        if($rs){
            $this->success('修 改 成 功');
            exit();
        }else{
            $this->error('修改失败');
            exit();
        }
    }

    /**
     *ajax添加文章
     */
    public function addRowThesis(){
        $artId = getRandStr(15);
        $uid = session('uid');
        $phone = session('phone');
        $username = session('username');
        $title = I('post.title');
        $content = I('post.content');
        $typeId = I('post.typeId');
        $saveTime = date('Y-m-d H:i:s');
        $sendTime = date('Y-m-d H:i:s');
        $status = I('post.status');
        $selfTypeId = I('post.selfTypeId');
        $tag = I('post.tag');
        $isOpen = I('post.isOpen');
        $articleModel = D('User/Article');
        $rs = $articleModel->addRow($artId,$uid,$phone,$username,$title,$content,$typeId,$saveTime,$sendTime,$status,$selfTypeId,$tag,$isOpen);
        if($rs){
            if($status == 2){
                $this->success('投 递 成 功');
                exit();
            }else{
                $this->success('已 保 存 到 草 稿 箱');
                exit();
            }
        }else{
            $this->error('添加失败');
            exit();
        }
    }

    /**
     *加载编辑文章
     */
    public function editthesis(){
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $this->assign('typeList',$typeList);
        $this->display();
    }

    /**
     *加载写文章
     */
    public function addthesis(){
        $artId = I('get.cate_id');
        if($artId){
            $articleModel = D('User/Article');
            $artInfo = $articleModel->findRow($artId);
        }else{
            $artInfo = '';
        }
        $typeModel = D('Sadmin/Type');
        $sysTypeList = $typeModel->getTypeListByStatus(1);
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $this->assign('sysTypeList',$sysTypeList);
        $this->assign('typeList',$typeList);
        $this->assign('artInfo',$artInfo);
        $this->display();
    }

    /**
     *加载垃圾箱
     */
    public function afterThesis(){
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $articleModel = D('User/Article');
        $articleList = $articleModel->getRows($uid,3);
        if(empty($articleList)){
            $articleList = '';
        }else{
            foreach($articleList as $k => $v){
                $content1 = strip_tags(html_entity_decode($v['content']));
//                $content2 = substr($content1,0,200);
//                $content3 = substr($content1,200,200);
//                $articleList[$k]['content'] = $content2."<br>".$content3."............";
                $articleList[$k]['content'] = $content1;
            }
        }
        $this->assign('articleList',$articleList);
        $this->assign('typeList',$typeList);
        $this->display();
    }

    /**
     *加载我的文章
     */
    public function mythesis(){
        $typeId = I('get.typeId');
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $articleModel = D('User/Article');
        $count = $articleModel->getCount($uid,3,2,$typeId);
        $where['uid'] = $uid;
        $where['ispass'] = array('in','3,4');
//        $where['ispass'] = 4;
        $where['status'] = 2;
        $where['typeid'] = $typeId;
        $page = getPage($count,3,$where);
//        print_r($page);exit();
        $articleList = $articleModel->getPassedList($page->firstRow,$page->listRows,$uid,array('in','3,4'),2,$typeId);
        if(empty($articleList)){
            $articleList = '';
        }else{
            foreach($articleList as $k => $v){
                $content1 = strip_tags(html_entity_decode($v['content']));
//                $content2 = substr($content1,0,200);
//                $content3 = substr($content1,200,200);
//                $articleList[$k]['content'] = $content2."<br>".$content3."............";
                $articleList[$k]['content'] = $content1;
            }
        }
        $this->assign('articleList',$articleList);
        $this->assign('page', $page->show());       // 赋值分页输出
        $this->assign('typeList',$typeList);
        $this->display();
    }
    
    /**
     *加载草稿箱
     */
    public function nodeliver(){
        $typeId = I('get.typeId');
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $articleModel = D('User/Article');
        $count = $articleModel->getCount($uid,0,1,$typeId);
        $where['uid'] = $uid;
        $where['ispass'] = 0;
        $where['status'] = 1;
        $where['typeid'] = $typeId;
        $page = getPage($count,3,$where);
        $articleList = $articleModel->getPassedList($page->firstRow,$page->listRows,$uid,0,1,$typeId);
//        $articleList = $articleModel ->getRows($uid,1);
        foreach($articleList as $k => $v){
            $content1 = strip_tags(html_entity_decode($v['content']));
//            $content2 = substr($content1,0,200);
//            $content3 = substr($content1,200,200);
//            $articleList[$k]['content'] = $content2."<br>".$content3."............";
            $articleList[$k]['content'] = $content1;
        }
        $typeModel = D('Sadmin/Type');
        $sysTypeList = $typeModel->getTypeListByStatus(1);
        $this->assign('sysTypeList',$sysTypeList);
        $this->assign('page', $page->show());       // 赋值分页输出
        $this->assign('articleList',$articleList);
        $this->assign('typeList',$typeList);
        $this->display();
    }
    
    /**
     *加载投递箱
     */
    public function delivered(){
        $typeId = I('get.typeId');
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $articleModel = D('User/Article');
        $count = $articleModel->getCount($uid,5,2,$typeId);
        $where['uid'] = $uid;
        $where['ispass'] = 5;
        $where['status'] = 2;
        $where['typeid'] = 0;
        $page = getPage($count,3,$where);
        $articleList = $articleModel->getPassedList($page->firstRow,$page->listRows,$uid,5,2,$typeId);
//        $articleList = $articleModel->getAllPassedList($uid,5,2);
        if(empty($articleList)){
            $articleList = '';
        }else{
            foreach($articleList as $k => $v){
                $content1 = strip_tags(html_entity_decode($v['content']));
//                $content2 = substr($content1,0,200);
//                $content3 = substr($content1,200,200);
//                $articleList[$k]['content'] = $content2."<br>".$content3."............";
                $articleList[$k]['content'] = $content1;

            }
        }
//        print_r($articleList[0]);exit();
        $this->assign('articleList',$articleList);
        $this->assign('page', $page->show());       // 赋值分页输出
        $this->assign('typeList',$typeList);
        $this->display();
    }
    
    /**
     *加载已投递论文
     */
    public function new_file(){
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $typeList = $selfTypeModel->getRows($uid);
        $this->assign('typeList',$typeList);
        $this->display();
    }
    
}