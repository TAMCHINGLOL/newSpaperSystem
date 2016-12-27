<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/12 16:53
 * @Description: 描述
 */

namespace Sadmin\Controller;


use Common\Controller\BaseController;
use Think\Controller;

class ArticleController extends BaseController
{
    protected $articleModel;
    protected $result;

    /**
     * 是否放入优文箱
     * @Author: ludezh
     */
    public function isBox(){
        $artId = I('post.artId');
        $status = I('post.status'); //1否2是
        if($artId){
            $articleModel = D('User/Article');
            $rs = $articleModel->isBoxRow($artId,$status);
            if($rs){
                $this->success('操 作 成 功');
                exit();
            }else{
                $this->error('操 作 失 败');
                exit();
            }
        }else{
            $this->error('请选择加入优文箱的文章');
            exit();
        }
    }

    /**
     * 加载某一文章内容
     * @Author: ludezh
     */
    public function article(){
        $artId = I('get.artid');
        $articleModel = D('User/Article');
        $userModel = D('User/User');
        $typeModel = D('Sadmin/Type');
        $artInfo = $articleModel->getRowByArtId($artId);
        $artInfo['typename'] = $typeModel->getNameById($artInfo['typeid']);
        $userInfo = $userModel->getRowsByUid($artInfo['uid']);
        $artInfo['content'] = html_entity_decode($artInfo['content']);
        $this->assign('artInfo',$artInfo);
        $this->assign('userInfo',$userInfo);
        $this->display();
    }

    /**
     * 获取文章详情
     * @Author: ludezh
     */
    public function artDetail(){
        $articleModel = D('User/Article');
        $manageCommModel = D('User/ManageComm');
        $userModel = D('User/User');
        $typeModel = D('Sadmin/Type');
        $artId = I('get.articleDetailsArtId');
//        echo json_encode($artId);
        $artInfo = $articleModel->findRow($artId);
        $artInfo['content'] = html_entity_decode($artInfo['content']);
        $personInfo = $userModel->getRowByUid($artInfo['uid']);
        $manageInfo = $manageCommModel->getRowByArtId($artId);
        $artInfo['typename'] = $typeModel->getNameById($artInfo['typeid']);
        $this->assign('artInfo',$artInfo);
        $this->assign('personInfo',$personInfo);
        $this->assign('manageInfo',$manageInfo);
        $this->display();
    }

    /**
     *加载待处理论文页面
     */
    public function waitList(){
        $typeModel = D('Sadmin/Type');
        $typeList = $typeModel->findTypeList();
        $this->assign('typeList',$typeList);
        $this->display();
    }

    /**
     *加载已处理论文页面
     */
    public function dealList(){
        $typeModel = D('Sadmin/Type');
        $typeList = $typeModel->findTypeList();
        $this->assign('typeList',$typeList);
        $this->display();
    }

    /**
     *ajax(dataTables服务器请求)加载论文列表
     */
    public function articleList(){
        $data['draw'] = I('get.draw');
        $type = I('get.type');      //区分加载论文的状态(2级已通过,3级未通过/已通过)
//        echo $type;exit();
        $isPass = I('get.status');      //区分加载论文的状态(2级已通过,3级未通过/已通过)
        $start = I('get.start');        //起始条数
        $limit = I('get.length');       //每页条数
        $extraSearch = I('get.extraSearch');   //关键字查询(手机号/用户名/标题)
        $typeId = $extraSearch[0];      //分类id
        $keyword = $extraSearch[1];     //关键字
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->getArtList($start,$limit,$typeId,$keyword,$isPass);
        if(!empty($this->result['list'])){
            $typeModel = D('Sadmin/Type');
//            $subUserModel = D('User/SubUser');
            foreach($this->result['list'] as $k => $v){
                if($type == 1){
                    $data1 = $v['tag'];
                    $data2 = $v['sendtime'];
                    $data3 = $v['isbox'];
                }else{
                    $data1 = $v['sendtime'];
                    $data2 = $v['passtime'];
                    $data3 = $v['isbox'];
                }

                $data['data'][$k] = array(
                    $v['artid'],
                    $v['username'],
                    $v['title'],
                    $typeModel->getNameById($v['typeid']),
//                    $subUserModel->getUserNameByUid($v['dealuid']),
                    $data1,
                    $data2,
                    $data3,
//                    $v['sendtime'],
//                    $v['passtime'],
//                    $v['isbox'],
                );
            }
        }else{
            $data['data'] = array();
        }
        $data['recordsTotal'] = $this->result['count'];    //必须
        $data['recordsFiltered'] = $this->result['count']; //必须
        echo str_replace("\\/", "/",  json_encode($data)); exit();
//        $this->assign('artList',$this->result);
    }

    /**
     *加载论文详情页面
     */
    public function articleInfo(){
        $uid = I('post.uid');
        $artId = I('post.artId');
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->getArtByUidAndArtId($uid,$artId);
        $this->assign('artInfo',$this->result);
    }

    /**
     *是否通过审核
     */
    public function isAgreePass(){
        $isPass = I('post.status');
        $artId = trim(I('post.artId'));
        $uid = trim(I('post.userId'));
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->updateIsPassByUid($uid,$artId,$isPass,date('Y-m-d H:i:s'));//添加处理时间
        if($this->result){
            $this->success('审 核 成 功');
            exit();
        }else{
            $this->error('审 核 失 败');
            exit();
        }
    }

    /**
     *是否置顶
     */
    public function setUpTop(){
        $isTop = I('post.isTop');
        $artId = I('post.artId');
        $uid = I('post.uid');
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->updateIsTop($uid,$artId,$isTop);
        if($this->result){
            $this->success('置顶成功');
            exit();
        }else{
            $this->error('置顶失败');
            exit();
        }
    }

}