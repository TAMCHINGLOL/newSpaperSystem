<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/11 11:46
 * @Description: 描述
 */

namespace Admin\Model;


use Think\Model;

class RoleModel extends Model
{
    protected $tableName = 'role';

    /**
     * 获取角色列表
     * @return mixed
     */
    public function getRoleList(){
        return $this->select();
    }

    /**
     * 添加角色
     * @param $name
     * @param $description
     * @return mixed
     */
    public function addRole($name, $description){
        $data['rolename'] = $name;
        $data['descript'] = $description;
        return $this->add($data);
    }

    /**
     * 修改角色
     * @param $id
     * @param $name
     * @param $description
     * @return bool
     */
    public function updateRole($id, $name, $description){
        $where['roleid'] = $id;
        $data['rolename'] = $name;
        $data['descript'] = $description;
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