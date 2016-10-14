<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/11 10:55
 * @Description: 描述
 */

namespace Admin\Controller;


use Think\Controller;

class RoleController extends Controller
{
    /**
     *加载角色管理页面
     */
    public function index(){
        $this->display();
    }


    /**
     *ajax加载角色列表
     */
    public function roleList(){
        $roleModel = D('Admin/Role');
        $rs =  $roleModel->getRoleList();
        $this->assign('roleList',$rs);
    }

    /**
     *添加角色
     */
    public function addRole(){
        $name = I('post.name');
        $description = I('post.desc');
        $roleModel = D('Admin/Role');
        $rs = $roleModel->addRole($name,$description);
        if($rs){ $this->success('添加成功'); }
        else{ $this->error('添加失败'); }
    }

    /**
     *修改角色
     */
    public function updateRole(){
        $id = I('post.id');
        $name = I('post.name');
        $description = I('post.desc');
        $roleModel = D('Admin/Role');
        $rs = $roleModel->updateRole($id,$name,$description);
        if($rs){ $this->success('修改成功'); }
        else{ $this->error('修改失败'); }
    }

    /**
     *删除角色
     */
    public function deleteRole(){
        $id = I('post.id');
        $roleModel = D('Admin/Role');
        $rs = $roleModel->deleteRole($id);
        if($rs){ $this->success('删除成功'); }
        else{ $this->error('删除失败'); }
    }
}