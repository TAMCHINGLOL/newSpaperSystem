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
        return $this->where($where)->getField('password,username');
    }

    /**
     * 根据用户名查找该记录
     * @param $userName
     * @return mixed
     */
    function findRowByUserName($userName){
        $where['username'] = $userName;
        return $this->where($where)->find();
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
}