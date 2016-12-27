<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/10 20:35
 * @Description: 描述
 */

namespace Sadmin\Controller;


use Common\Controller\BaseController;
use Think\Controller;

class TypeController extends BaseController
{

    /**
     * 修改是否置顶
     * @Author: ludezh
     */
    public function isTop(){
        $id = I('post.id');
        $status = I('post.status');
        $typeModel = D('Sadmin/Type');
        $rs = $typeModel->isTopRow($id,$status);
        if($status == 1){
            $typeModel->isOpenRow($id,$status);
        }
        if($rs){
            $this->success('操 作 成 功');
            exit();
        }else{
            $this->error('操 作 失 败');
            exit();
        }
    }

    /**
     * 修改启用/禁用
     * @Author: ludezh
     */
    public function isOpen(){
        $id = I('post.id');
        $status = I('post.status');
        $typeModel = D('Sadmin/Type');
        $rs = $typeModel->isOpenRow($id,$status);
        if($status == 2){
            $typeModel->isTopRow($id,$status);
        }
        if($rs){
            $this->success('操 作 成 功');
            exit();
        }else{
            $this->error('操 作 失 败');
            exit();
        }
    }

    /**
     *加载分类管理一级分类页面
     */
    public function index(){
        $this->display();
    }

    /**
     *加载二级分类管理页面
     */
    public function secondIndex(){
        $this->display();
    }

    /**
     *ajax加载分类列表(通过标识区分查一级/二级列表[暂不实现])
     */
    public function typeList(){
        $typeModel = D('Sadmin/Type');
        $typeList = $typeModel->getTypeList();
        $this->assign('typeList',$typeList);
        $this->display();
    }

    /**
     *获取一级分类列表
     */
    public function getFirstLevel(){
        $level = 1;
        $levelName = 'firstLevel';
        $typeModel = D('Admin/Type');
        $typeList = $typeModel->getTypeList($level,$levelName);
        $this->assign('typeList',$typeList);
    }

    /**
     * 加载添加/编辑分类页面
     * @Author: ludezh
     */
    public function addType(){
        $typeId = I('get.typeId');
        if(empty($typeId)){
            $typeInfo = '';
        }else{
            $typeModel = D('Sadmin/Type');
            $typeInfo = $typeModel->getRow($typeId);
            $typeInfo['picurl'] = substr($typeInfo['picurl'], strrpos($typeInfo['picurl'], '/')+1);
        }
        $this->assign('typeInfo',$typeInfo);
        $this->display();
    }

    /**
     * 添加/编辑文章分类
     * @Author: ludezh
     */
    public function addTypeRow1(){
        header('Content-type: text/html; charset=UTF-8');
        $tag = I('post.tag');
        if($tag == 1){
            $this->success('操 作 成 功');
//            $info = session('UploadInfo');
//            if(session('UploadStatus') == 0){
//                $this->error($info);
//                exit();
//            }else{
//                $this->success($info);
//                exit();
//            }
        }else{
            session('UploadStatus',null);
            session('UploadInfo',null);
            $typeId = I('post.typeId');
            $typeName = I('post.typeName');
            $typeRemark = I('post.typeRemark');
            $typeModel = D('Sadmin/Type');
            if($_FILES['imgFile']['name']){
                $picData = picUpload('typePicFile');     //调用图片上传公共方法
                if($picData['status'] == 0){
                    session('UploadStatus',0);
                    session('UploadInfo',$picData['info']);
                    exit();
                }
            }
            if($typeId){    //修改
                $rs = $typeModel->updateRow($typeId,$typeName,$typeRemark,$picData['info']);
            }else{  //新增
                $rs = $typeModel->addRow($typeName,$typeRemark,$picData['info']);
            }
            session('UploadStatus',1);
            session('UploadInfo','操 作 成 功');
            exit();
//            if($rs){
//                session('UploadStatus',1);
//                session('UploadInfo','操 作 成 功');
////                $this->success('操 作 成 功');
//                exit();
//            }else{
//                session('UploadStatus',0);
//                session('UploadInfo','操 作 失 败');
////                $this->error('操 作 失 败');
//                exit();
//            }
        }
    }

    /**
     *添加分类(区分一级二级分类)
     */
    public function addTypeRow(){
        $typeTag = I('post.typeTag');               //用于区分一级/二级分类
        $typeModel = D('Admin/Type');
        if($typeTag == 'firstLevel'){
            $typename = I('post.name');
            $level = 1;
            $levelName = 'firstLevel';
            $order = I('post.order');
            $heatOrder = empty($order) ? 99 : 100;
            $picUrl = '';
            $rs = $typeModel->addFirstType($typename,$level,$levelName,$picUrl,$heatOrder);
        }else if($typeTag == 'secondLevel'){
            $typename = I('post.name');
            $parentId = I('post.parentId');
            $level = 2;
            $levelName = 'secondLevel';
            $rs = $typeModel->addSecondType($typename,$parentId,$level,$levelName);
        }else{
            $rs = 0;
        }
        if($rs){
            $this->success('添加成功');
            exit();
        }else{
            $this->error('添加失败');
            exit();
        }
    }

    /**
     *修改分类
     */
    public function updateType(){
        $typeTag = I('post.typeTag');               //用于区分一级/二级分类
        $typeModel = D('Admin/Type');
        if($typeTag == 'firstLevel'){
            $typeId = I('post.typeId');
            $level = 1;
            $typeName = I('post.name');
            $order = I('post.order');
            $heatOrder = empty($order) ? 99 : 100;
            $picUrl = '';
            $rs = $typeModel->updateFirstType($typeId,$level,$typeName,$picUrl,$heatOrder);
        }else if($typeTag == 'secondLevel'){
            $typeId = I('post.typeId');
            $level = 2;
            $typeName = I('post.name');
            $parentId = I('post.parentId');
            $rs = $typeModel->updateSecondType($typeId,$level,$typeName,$parentId);
        }else{
            $rs = 0;
        }
        if($rs){
            $this->success('修改成功');
            exit();
        }else{
            $this->error('修改失败');
            exit();
        }
    }

    /**
     *删除分类
     */
    public function delType(){
        $typeTag = I('post.typeTag');               //用于区分一级/二级分类
        $typeModel = D('Admin/Type');
        if($typeTag == 'firstLevel'){
            $typeId = I('post.id');
            $level = 1;
        }else if($typeTag == 'secondLevel'){
            $typeId = I('post.id');
            $level = 2;
        }
        $rs = $typeModel->deleteType($typeId,$level);
        if($rs){
            $this->success('删除成功');
            exit;
        }else{
            $this->error('删除失败');
            exit;
        }
    }
}