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
     * @param $start
     * @param $limit
     * @param $isDefriend
     * @param $keyword
     * @return array
     * @Author: ludezh
     */
    public function getUserAllList($start, $limit, $isDefriend, $keyword){
        if(empty($isDefriend) && empty($keyword)){
            $where = array();
        } else {
            if (!empty($isDefriend) && empty($keyword)) {
                $where['isdefriend'] = $isDefriend;
            } else if (empty($isDefriend) && !empty($keyword)) {
                $where['phone'] = array('like', '%'.$keyword.'%');
                $where['alias'] = array('like', '%'.$keyword.'%');
                $where['uid'] = array('like', '%'.$keyword.'%');
                $where['_logic'] = 'OR';
            } else {
                $map['phone'] = array('like', '%'.$keyword.'%');
                $map['alias'] = array('like', '%'.$keyword.'%');
                $map['uid'] = array('like', '%'.$keyword.'%');
                $map['_logic'] = 'OR';
                $where['_complex'] = $map;                  //复合查询
                $where['isdefriend'] = $isDefriend;
            }
        }
        $list = $this->where($where)->order('id desc')->limit($start,$limit)->select();
        $count = $this->where($where)->count();
        $data = array(
            'list' => $list,
            'count' => $count
        );
        return $data;
    }

    /**
     * @param $uid
     * @return mixed
     * @Author: ludezh
     */
    public function getRowsByUid($uid){
        $where['uid'] = $uid;
        $field = array('uid','username','alias');
        return $this->field($field)->where($where)->find();
    }

    /**
     * 修改/绑定邮箱
     * @param $email
     * @param $uid
     * @return bool
     */
    public function updateEmailByUid($email, $uid){
        $data['email'] = $email;
        $where['uid'] = $uid;
        return $this->where($where)->save($data);
    }

    /**
     * 修改/绑定手机号
     * @param $phone
     * @param $uid
     * @return bool
     */
    public function updatePhoneByUid($phone, $uid){
        $data['phone'] = $phone;
        $where['uid'] = $uid;
        return $this->where($where)->save($data);
    }

    /**
     * 修改信息通过uid
     * @param $uid
     * @param $data
     * @return bool
     */
    public function updateRowByUid($uid, $data){
        $where['uid'] = $uid;
        return $this->where($where)->save($data);
    }

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
        $files = array(
            'password',
            'id',
            'uid',
            'username',
            'isdefriend'
        );
        return $this->field($files)->where($where)->find();
    }

    /**
     * 根据别名登录
     * @param $username
     * @return mixed
     */
    public function loginName($username){
        $where['alias'] = $username;
        $files = array(
            'password',
            'id',
            'uid',
            'username',
            'isdefriend'
        );
        return $this->field($files)->where($where)->find();
    }

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
     * 根据用户手机号查询该记录
     * @param $phone
     * @return mixed
     */
    public function getRowByPhone($phone){
        $where['phone'] = $phone;
        return $this->where($where)->find();
    }

    /**
     * 根据用户email查询该记录
     * @param $email
     * @return mixed
     */
    public function getRowByEmail($email){
        $where['email'] = $email;
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
            'alias' => $name
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

    /**
     * 修改密码
     * @param $uid
     * @param $password
     * @return bool
     */
    public function updatePassword1($uid, $password){
        $where['uid'] = $uid;
        $data['password'] = $password;
        return $this->where($where)->save($data);
    }
}