<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/11 0:46
 * @Description: 描述
 */

namespace Admin\Model;


use Think\Model;

class TypeModel extends Model
{
    protected $tableName = 'type';

    /**
     * 获取所有满足条件的列表
     * @param $typeLevel
     * @param $levelName
     * @return mixed
     */
    public function getTypeList($typeLevel, $levelName){
        $where['typelevel'] = $typeLevel;
        $where['levelname'] = $levelName;
        return $this->where($where)->select();
    }

    /**
     * 添加一级分类
     * @param $typename
     * @param $level
     * @param $levelName
     * @param $picUrl
     * @param $heatOrder
     * @return mixed
     */
    public function addFirstType($typename, $level, $levelName, $picUrl, $heatOrder){
        $data = array(
            'typename' => $typename,
            'typelevel' => $level,
            'levelname' => $levelName,
            'picurl' => $picUrl,
            'heatorder' => $heatOrder
        );
        return $this->add($data);
    }

    /**
     * 添加二级分类
     * @param $typename
     * @param $parentId
     * @param $level
     * @param $levelName
     * @return mixed
     */
    public function addSecondType($typename, $parentId, $level, $levelName){
        $data = array(
            'typename' => $typename,
            'parentid' => $parentId,
            'typelevel' => $level,
            'levelname' => $levelName
        );
        return $this->add($data);
    }

    /**
     * 更新一级分类
     * @param $typeId
     * @param $level
     * @param $typeName
     * @param $picUrl
     * @param $heatOrder
     * @return bool
     */
    public function updateFirstType($typeId, $level, $typeName, $picUrl, $heatOrder){
        $where = array('typeid' => $typeId,'typelevel' => $level);
        $data = array(
            'typename' => $typeName,
            'picurl' => $picUrl,
            'heatorder' => $heatOrder
        );
        return $this->where($where)->save($data);
    }

    /**
     * 更新二级分类
     * @param $typeId
     * @param $level
     * @param $typeName
     * @param $parentId
     * @return bool
     */
    public function updateSecondType($typeId, $level, $typeName, $parentId){
        $where['typeid'] = $typeId;
        $where['typelevel'] = $level;
        $data['typename'] = $typeName;
        $data['parentid'] = $parentId;
        return $this->where($where)->save($data);
    }

    /**
     * 删除分类
     * @param $typeId
     * @param $level
     * @return mixed
     */
    public function deleteType($typeId, $level){
        $where['typeid'] = $typeId;
        $where['typelevel'] = $level;
        return $this->where($where)->delete();
    }
}