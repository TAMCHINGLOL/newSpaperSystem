<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/11 11:46
 * @Description: 描述
 */

namespace Sadmin\Model;


use Think\Model;

class RoleModel extends Model
{
    protected $tableName = 'role';

    /**
     * @param $roleId
     * @return mixed
     * @Author: ludezh
     */
    public function getRow($roleId){
        $where['roleid'] = $roleId;
        return $this->where($where)->find();
    }

    /**
     * 获取角色列表
     * @return mixed
     */
    public function getRoleList(){
        return $this->order('roleid desc')->select();
    }

    /**
     * 添加角色
     * @param $name
     * @param $roleAuth
     * @param $description
     * @return mixed
     */
    public function addRole($name, $roleAuth, $description){
        $data['rolename'] = $name;
        $data['descript'] = $description;
        $data['roleauth'] = $roleAuth;
        return $this->add($data);
    }

    /**
     * 修改角色
     * @param $id
     * @param $name
     * @param $roleAuth
     * @param $description
     * @return bool
     */
    public function updateRole($id, $name, $roleAuth, $description){
        $where['roleid'] = $id;
        $data['rolename'] = $name;
        $data['descript'] = $description;
        $data['roleauth'] = $roleAuth;
        return $this->where($where)->save($data);
    }

    /**
     * 删除角色
     * @param $roleId
     * @return mixed
     */
    public function deleteRole($roleId){
        $where['roleid'] = $roleId;
        return $this->where($where)->delete();
    }
}