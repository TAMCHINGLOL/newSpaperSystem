<?php

/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/9 0:45
 * @Description: 描述
 */
namespace User\Model;
use Think\Model;

class UserModel extends Model
{
    protected $tableName = 'users';

    /**
     * 更新用户状态(1为未被发送聘任消息,2则反之)
     * @param $uid
     * @param $status
     * @return bool
     */
    public function updateUserStatus($uid, $status){
        $where['uid'] = $uid;
        $data['status'] = $status;
        return $this->where($where)->save($status);
    }
    /**
     * 是否拉黑用户
     * @param $uid
     * @param $phone
     * @param $isDeFriend
     * @return bool
     */
    public function manageUser($uid, $phone, $isDeFriend){
        $where['uid'] = $uid;
        $where['phone'] = $phone;
        $data['isdefriend'] = $isDeFriend;
        return $this->where($where)->save($data);
    }

    /**
     * 获取用户列表
     * @return mixed
     */
    public function getUserList($status){
        $where['status'] = $status;
        return $this->where($where)->select();
    }

    /**
     * 根据手机号登录
     * @param $phone
     * @return mixed
     */
    public function login($phone){
        $where['phone'] = $phone;
        return $this->where($where)->getField('password,uid,isdefriend');
    }

    /**
     * 根据用户手机号查询该记录
     * @param $phone
     * @return mixed
     */
    public function getRowByPhone($phone){
        $where['phone'] = $phone;
        return $this->where($where)->find();
    }

    /**
     * 用户注册
     * @param $uid
     * @param $phone
     * @param $pwd
     * @param $name
     * @return mixed
     */
    public function register($uid, $phone, $pwd, $name){
        $data = array(
            'uid' => $uid,
            'phone' => $phone,
            'password' => $pwd,
            'username' => $name
        );
        return $this->add($data);
    }


    /**
     * 修改密码
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