<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/12/4 16:03
 * @Description: 描述
 */

namespace Sadmin\Controller;


use Common\Controller\BaseController;

class HomeController extends BaseController
{

    /**
     * 是否置顶
     * @Author: ludezh
     */
    public function isTopRow(){
        $artId = I('post.id');
        $status = I('post.status');
        if($artId){
            $articleModel = D('User/Article');
            $rs = $articleModel->updateIsTop1($artId, $status);
            if($rs){
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
     * @Author: ludezh
     */
    public function delPic(){
        $id = I('post.id');
        if($id){
            $homePicModel = D('Sadmin/HomePic');
            $rs = $homePicModel->delRow($id);
            if($rs){
                $this->success('删 除 成 功');
                exit();
            }else{
                $this->error('删 除 失 败');
                exit();
            }
        }else{
            $this->error('请选择要删除的轮播图');
            exit();
        }
    }

    /**
     * 添加/编辑轮播图
     * @Author: ludezh
     */
    public function addPicRow(){
        header('Content-type: text/html; charset=UTF-8');
        $tag = I('post.tag');
        if($tag == 1){
            $this->success('操 作 成 功');
            exit();
        }else{
            session('UploadStatus',null);
            session('UploadInfo',null);
            $id = I('post.typeId');
            $selectType = I('post.selectType');
            $typeRemark = I('post.typeRemark');
            $homePicModel = D('Sadmin/HomePic');
            if($_FILES['imgFile']['name']){
                $picData = picUpload('lunBoFile');     //调用图片上传公共方法
                if($picData['status'] == 0){
                    session('UploadStatus',0);
                    session('UploadInfo',$picData['info']);
                    exit();
                }
            }
            if($id){    //修改
                $homePicModel->updateRow($id,$selectType,$picData['info'],$typeRemark);
            }else{  //新增
                $homePicModel->addRow($selectType, $picData['info'], $typeRemark);
            }
            session('UploadStatus',1);
            session('UploadInfo','操 作 成 功');
            exit();
        }
    }

    /**
     * 添加/编辑
     * @Author: ludezh
     */
    public function addPic(){
        $picId = I('get.id');
        if($picId){
            $homePicModel = D('Sadmin/HomePic');
            $picInfo = $homePicModel->getRowById($picId);
            $picInfo['picurl'] = substr($picInfo['picurl'], strrpos($picInfo['picurl'], '/')+1);
        }else{
            $picInfo = '';
        }
        $typeModel = D('Sadmin/Type');
        $typeList = $typeModel->findTypeList();
        $this->assign('typeList',$typeList);
        $this->assign('picInfo',$picInfo);
        $this->display();
    }

    /**
     * 轮播图管理
     * @Author: ludezh
     */
    public function pictureList(){
        $homePicModel = D('Sadmin/HomePic');
        $typeModel = D('Sadmin/Type');
        $picList = $homePicModel->getRows();
        foreach($picList as $k => $v){
            $picList[$k]['typeid'] = $typeModel->getNameById($v['typeid']);
            $picList[$k]['picurl'] = substr($v['picurl'], strrpos($v['picurl'], '../')+1);
        }
        $this->assign('picList',$picList);
        $this->display();
    }

    /**
     * 热门分类
     * @Author: ludezh
     */
    public function typeList(){

    }

    /**
     * 论文排版
     * @Author: ludezh
     */
    public function artList(){
        $articleModel = D('User/Article');
        $artList = $articleModel->getIsBoxList();
        $typeModel = D('Sadmin/Type');
        foreach($artList as $k => $v){
            $data[$k]['artid'] = $v['artid'];
            $data[$k]['username'] = $v['username'];
            $data[$k]['title'] = $v['title'];
            $data[$k]['typeid'] = $typeModel->getNameById($v['typeid']);
            $data[$k]['sendtime'] = $v['sendtime'];
            $data[$k]['passtime'] = $v['passtime'];
            $data[$k]['istop'] = $v['istop'];
            $data[$k]['isbox'] = $v['isbox'];
        }
        $this->assign('artList',$data);
        $this->display();
    }

    /**
     * 优秀笔者
     * @Author: ludezh
     */
    public function writerList(){

    }

}