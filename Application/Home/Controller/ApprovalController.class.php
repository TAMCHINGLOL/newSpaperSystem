<?php
namespace Home\Controller;
use Common\Controller\CommonController;
use Think\Controller;

class ApprovalController extends CommonController {

    /**
     * 是否同意通过审核
     * @return bool
     * @Author: ludezh
     */
    public function isAgreePass(){
        $status = I('post.status');
        $artId = I('post.artId');
        $grad = I('post.grad');
        $discuss = I('post.discuss');
        $adminRole = session('roleid');
        if($adminRole == 3 || $adminRole == 6){
            $uid = session('uid');
            $name = session('username');
            $manageCommModel = D('User/ManageComm');
            $rs = $manageCommModel->addCommentByStaff($uid, $name, $adminRole, $artId, $grad, $discuss);
            if($status == 2 && $adminRole == 3){
                $isPass = 1;
            }elseif($status == 2 && $adminRole == 6){
                $isPass = 2;
            }else{
                $isPass = 4;
            }
            $artModel = D('User/Article');
            $result =  $artModel->updatePassByArtId($artId,$isPass);
            if($rs && $result){
                $this->success('操 作 成 功');
                exit();
            }else{
                $this->error('操 作 失 败');
                exit();
            }
        }else{
            $this->error('非 法 操 作');
            exit();
        }
    }

    /**
     * 加载某一文章详情
     * @Author: ludezh
     */
    public function article(){
        $artId = I('get.artId');
        $articleModel = D('User/Article');
        $userModel = D('User/User');
        $typeModel = D('Sadmin/Type');
        $artInfo = $articleModel->findRow($artId);
        $artInfo['typename'] = $typeModel->getNameById($artInfo['typeid']);
        $userInfo = $userModel->getRowsByUid($artInfo['uid']);
        $artInfo['content'] = html_entity_decode($artInfo['content']);
        $this->assign('artInfo',$artInfo);
        $this->assign('userInfo',$userInfo);
        $this->display();
    }

    function dss(){

    }
    /**
     * 加载待审核文章列表(分页)
     * @Author: ludezh
     */
    public function approvalfirst(){
        $articleModel = D('User/Article');
//        $typeId = session('typeid');
        $subUerModel = D('User/SubUser');
        $typeId = $subUerModel->getTypeIdByUid(session('uid'));
        session('typeid',$typeId);
        if(session('roleid') == 3){
            $isPass = 5;
        }else if(session('roleid') == 6){
            $isPass = 1;
        }else{
            $this->error('非法操作');
            exit;
        }
//        echo $typeId;exit();
        $status = 2;
//        echo $typeId;exit();
        $count = $articleModel->getListCountByCondition($status,$isPass,$typeId);
        $page = getPage($count,5);
//        print_r($page);exit();
        $articleList = $articleModel->getListByCondition($page->firstRow,$page->listRows,$status,$isPass,$typeId);
        foreach($articleList as $k => $v){
            $content1 = strip_tags(html_entity_decode($v['content']));
//            $content2 = substr($content1,0,200);
//            $content3 = substr($content1,200,200);
//            $articleList[$k]['content'] = $content2."<br>".$content3."............";
            $articleList[$k]['content'] = $content1;
        }
        $this->assign('articleList', $articleList); // 赋值数据集
        $this->assign('page', $page->show());       // 赋值分页输出
        $this->display();
    }

    /**
     *加载论文分类
     */
    public function approvalfirst1(){
        $this->display();
    }

    /**
     *加载论文展示
     */
    public function approvalsecond(){
        $this->display();
    }

}
?>