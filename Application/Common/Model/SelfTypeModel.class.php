<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/11/27 20:02
 * @Description: 描述
 */

namespace Common\Model;


use Think\Model;

class SelfTypeModel extends Model
{
    protected $tableName = 'self_type';

    public function findRow($uid,$typeId){
        $where['uid'] = $uid;
        $where['id'] = $typeId;
        return $this->where($where)->find();
    }

    public function addRow($uid,$typeName){
        $data = array(
            'uid' => $uid,
            'typename' => $typeName
        );
        return $this->add($data);
    }

    public function getRows($uid){
        $field = array(
            'id',
            'typename'
        );
        $where['uid'] = $uid;
        return $this->field($field)->where($where)->select();
    }

    public function isExist($uid,$typename){
        $where['uid'] = $uid;
        $where['typename'] = $typename;
        return $this->where($where)->find();
    }
}