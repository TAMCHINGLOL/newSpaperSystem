<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/11/30 15:43
 * @Description: 描述
 */

namespace Sadmin\Model;


use Think\Model;

class AuthModel extends Model
{
    protected $tableName = 'auth';

    public function getRows($authStr){
        return $this->select($authStr);
    }

    public function getAllRows(){
        return $this->select();
    }
}