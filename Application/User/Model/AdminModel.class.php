<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/10 20:38
 * @Description: 描述
 */

namespace User\Model;


use Think\Model;

class AdminModel extends Model
{
    protected $tableName = "admin";

    /**
     * @param $uid
     * @return mixed
     * @Author: ludezh
     */
    public function getIdByUid($uid){
        $where['uid'] = $uid;
        return $this->where($where)->getField('id');
    }

    /**
     * 根据手机号登录
     * @param $phone
     * @return mixed
     */
    function loginByPhone($phone){
        $where['phone'] = $phone;
        return $this->where($where)->getField('password,username');
    }

    /**
     * 根据用户名登录
     * @param $userName
     * @return mixed
     */
    function loginByUserName($userName){
        $where['username'] = $userName;
        $field = array('password','username','uid');
        return $this->field($field)->where($where)->find();
    }

    /**
     * 根据用户名查找该记录
     * @param $userName
     * @return mixed
     */
    function findRowByUserName($userName){
        $where['username'] = $userName;
        $filed = array('username','phone','uid');
        return $this->field($filed)->where($where)->find();
    }

    /**
     * 根据uid查找该记录
     * @param $uid
     * @return mixed
     */
    function findRowByUid($uid){
        $where['uid'] = $uid;
        $filed = array('username','phone','uid','password','id');
        return $this->field($filed)->where($where)->find();
    }

    /**
     * 更新密码
     * @param $userName
     * @param $password
     * @return bool
     */
    function update($userName, $password){
        $where['username'] = $userName;
        $data['password'] = $password;
        return  $this->where($where)->save($data);
    }

    /**
     * 更新密码
     * @param $uid
     * @param $password
     * @return bool
     */
    function updatePwd($uid, $password){
        $where['uid'] = $uid;
        $data['password'] = $password;
        return  $this->where($where)->save($data);
    }
}