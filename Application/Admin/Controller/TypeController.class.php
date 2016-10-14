<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/10 20:35
 * @Description: 描述
 */

namespace Admin\Controller;


use Think\Controller;

class TypeController extends Controller
{
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
     *ajax加载分类列表(通过标识区分查一级/二级列表)
     */
    public function typeList(){
        $typeTag = I('post.typeTag');               //用于区分一级/二级分类
        $typeModel = D('Admin/Type');
        if($typeTag == 'firstLevel'){
            $level = 1;
            $levelName = 'firstLevel';
        }else if($typeTag == 'secondLevel'){
            $level = 2;
            $levelName = 'secondLevel';
        }

        $typeList = $typeModel->getTypeList($level,$levelName);
        $this->assign('typeList',$typeList);
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
     *添加分类
     */
    public function addType(){
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