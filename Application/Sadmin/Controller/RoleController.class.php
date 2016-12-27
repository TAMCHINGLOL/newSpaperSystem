<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/11 10:55
 * @Description: 描述
 */

namespace Sadmin\Controller;


use Common\Controller\BaseController;
use Think\Controller;

class RoleController extends BaseController
{
    /**
     * 删除角色
     * @Author: ludezh
     */
    public function roleDel(){
        $roleId = I('post.roleId');
        if($roleId){
            $roleModel = D('Sadmin/Role');
            $rs = $roleModel->deleteRole($roleId);
            if($rs){
                $this->success('删 除 成 功'); exit();
            }else{
                $this->error('删 除 失 败');exit();
            }
        }else{
            $this->error('请选择要删除的角色');exit();
        }
    }
    /**
     * 新增/编辑角色
     * @Author: ludezh
     */
    public function roleOper(){
        $roleId = I('post.roleId');
        $roleName = I('POST.roleName');         //角色名
        $roleDescript = I('POST.roleDescript'); //角色描述
        $chk_value = I('POST.chk_value');       //为角色分配的规则权限数组
        $chk_value_str = implode(",", $chk_value);
        $roleModel = D('Sadmin/Role');
        if(empty($roleId)){ //新增
            $rs = $roleModel->addRole($roleName,$chk_value_str,$roleDescript);
        }else{  //修改
            $rs = $roleModel->updateRole($roleId,$roleName,$chk_value_str,$roleDescript);
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
     * 加载编辑/添加页面
     * @Author: ludezh
     */
    public function roleAdd(){
        $roleId = I('get.roleId');
        $authArr = array();
        $authModel = D('Sadmin/Auth');
        $authRows = $authModel->getAllRows();
        if($roleId){
            $roleModel = D('Sadmin/Role');
            $info = $roleModel->getRow($roleId);
            $authList = $authModel->getRows($info['roleauth']);
            foreach($authList as $k => $v){
                $authArr[$k] = $v['name'];
            }
        }else{
            $info = '';
        }
        $this->assign('info',$info);
        $this->assign('authRow',$authRows);
        $this->assign('authArr',$authArr);
        $this->display();
    }

    /**
     *加载角色管理页面
     */
    public function roleList(){
        $roleModel = D('Sadmin/Role');
        $rs =  $roleModel->getRoleList();
        $this->assign('roleList',$rs);
        $this->display();
    }

    /**
     *ajax加载角色列表
     */
//    public function roleList(){
//        $roleModel = D('Admin/Role');
//        $rs =  $roleModel->getRoleList();
//        $this->assign('roleList',$rs);
//    }

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