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
     * @param $uid
     * @return mixed
     * @Author: ludezh
     */
    public function getTypeIdByUid($uid){
        $where['uid'] = $uid;
        return $this->where($where)->getField('typeid');
    }
    /**
     * @param $uid
     * @return mixed
     * @Author: ludezh
     */
    public function getUserNameByUid($uid){
        return $this->where(array('uid' => $uid))->getField('username');
    }

    /**
     * @param $uid
     * @return mixed
     * @Author: ludezh
     */
    public function deteleRow($uid){
        return $this->where(array('uid' => $uid))->delete();
    }

    /**
     * @param $uid
     * @param $status
     * @return bool
     * @Author: ludezh
     */
    public function updateIsDefriend($uid, $status){
        $where['uid'] = $uid;
        $data['isdefriend'] = $status;
        return $this->where($where)->save($data);
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
     * 修改绑定手机号
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
     * @param $uid
     * @param $name
     * @param $email
     * @param $address
     * @param $phone
     * @param $roleId
     * @param $sex
     * @param $icCardId
     * @param $parentId
     * @param $typeSelect
     * @return bool
     * @Author: ludezh
     */
    public function updateUser($uid, $name, $email, $address, $phone, $roleId, $sex, $icCardId, $parentId, $typeSelect){
        $where['uid'] = $uid;
        $data = array(
            'username' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'roleid' => $roleId,
            'sex' => $sex,
            'iccard' => $icCardId,
            'parentid' => $parentId,
            'typeid' => $typeSelect
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
     * @param $sex
     * @param $icCardId
     * @param $parentId
     * @param $typeSelect
     * @return mixed
     */
    public function addUser($uid, $name, $password, $email, $registerTime, $address, $phone, $roleId, $sex, $icCardId,$parentId,$typeSelect){
        $data = array(
            'uid' => $uid,
            'username' => $name,
            'password' => $password,
            'iccard' => $icCardId,
            'email' => $email,
            'registertime' => $registerTime,
            'address' => $address,
            'phone' => $phone,
            'roleid' => $roleId,
            'sex' => $sex,
            'parentid' => $parentId,
            'typeid' => $typeSelect
        );
        return $this->add($data);
    }

    /**
     * 获取所有子帐号
     * @return mixed
     */
    public function getUserList(){
        $field = array(
            'uid',
            'username',
            'phone',
            'email',
            'roleid',
            'registertime',
            'isdefriend'
        );
        return $this->field($field)->order('sub_user_id desc')->select();
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
            'isdefriend',
            'typeid',
            'roleid'
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
     * 根据手机号查询该记录
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