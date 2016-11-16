<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/9 20:46
 * @Description: 描述
 */

namespace User\Model;


use Think\Model;

class SubUserModel extends Model
{
    protected $tableName = 'sub_users';


    /**
     * 根据uid获取改记录
     * @param $uid
     * @return mixed
     */
    public function getRowByUid($uid){
        $where['uid'] = $uid;
        return $this->where($where)->find();
    }

    /**
     * 删除子帐号
     * @param $uid
     * @param $phone
     * @return mixed
     */
    public function delUser($uid, $phone){
        $where['uid'] = $uid;
        $where['phone'] = $phone;
        return $this->where($where)->delete();
    }

    /**
     * 修改子帐号
     * @param $uid
     * @param $name
     * @param $email
     * @param $registerTime
     * @param $address
     * @param $phone
     * @param $roleId
     * @return bool
     */
    public function updateUser($uid, $name, $email, $registerTime, $address, $phone, $roleId){
        $where['uid'] = $uid;
        $data = array(
            'username' => $name,
            'email' => $email,
            'registertime' => $registerTime,
            'address' => $address,
            'phone' => $phone,
            'roleid' => $roleId
        );
        return $this->where($where)->save($data);
    }

    /**
     * 添加子帐号
     * @param $uid
     * @param $name
     * @param $password
     * @param $email
     * @param $registerTime
     * @param $address
     * @param $phone
     * @param $roleId
     * @return mixed
     */
    public function addUser($uid, $name, $password, $email, $registerTime, $address, $phone, $roleId, $typeId){
        $data = array(
            'uid' => $uid,
            'username' => $name,
            'password' => $password,
            'email' => $email,
            'registertime' => $registerTime,
            'address' => $address,
            'phone' => $phone,
            'roleid' => $roleId,
            'typeid' => $typeId
        );
        return $this->add($data);
    }

    /**
     * 获取所有子帐号
     * @return mixed
     */
    public function getUserList(){
        return $this->select();
    }

    /**
     * 登录操作
     * @param $phone
     * @return mixed
     */
    public function login($phone){
        $where['phone'] = $phone;
        $files = array(
            'sub_user_id',
            'uid',
            'username',
            'parentid',
            'isdefriend'
        );
        return $this->field($files)->where($where)->find();
    }

    /**
     * 根据手机号查询该记录
     * @param $phone
     * @return mixed
     */
    public function getRowByPhone($phone){
        $where['phone'] = $phone;
        return $this->where($where)->find();
    }

    /**
     * 更新密码
     * @param $uid
     * @param $phone
     * @param $password
     * @return bool
     */
    public function updatePassword($uid, $phone, $password){
        $where['uid'] = $uid;
        $where['phone'] = $phone;
        $data['password'] = $password;
        return $this->where($where)->save($data);
    }

}