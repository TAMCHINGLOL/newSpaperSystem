<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/11 0:46
 * @Description: 描述
 */

namespace Sadmin\Model;


use Think\Model;

class TypeModel extends Model
{
    protected $tableName = 'type';

    /**
     * @param $id
     * @return mixed
     * @Author: ludezh
     */
    public function delRow($id){
        $where['typeid'] = $id;
        return $this->where($where)->delete();
    }

    /**
     * @param $typeId
     * @return mixed
     * @Author: ludezh
     */
    public function getPicByTypeId($typeId){
        $where['typeid'] = $typeId;
        $where['status'] = 1;
        $file = array(
            'picurl',
            'typename'
        );
        return $this->field($file)->where($where)->find();
    }
    /**
     * @param int $start
     * @param int $limit
     * @return mixed
     * @Author: ludezh
     */
    public function getHomeList($start = 0, $limit = 4){
        $where['status'] = 1;
        $where['istop'] = 1;
        return $this->where($where)->limit($start,$limit)->order('typeid desc')->select();
    }

    /**
     * @param $id
     * @param $isTop
     * @return bool
     * @Author: ludezh
     */
    public function isTopRow($id, $isTop){
        $where['typeid'] = $id;
        $data['istop'] = $isTop;
        return $this->where($where)->save($data);
    }

    /**
     * @param $id
     * @param $status
     * @return bool
     * @Author: ludezh
     */
    public function isOpenRow($id, $status){
        $where['typeid'] = $id;
        $data['status'] = $status;
        return $this->where($where)->save($data);
    }
    /**
     * @param $status
     * @return mixed
     * @Author: ludezh
     */
    public function getTypeListByStatus($status){
        $where['status'] = $status;
        return $this->where($where)->select();
    }
    /**
     * @param $typeName
     * @param $typeRemark
     * @param $picUrl
     * @return mixed
     * @Author: ludezh
     */
    public function addRow($typeName, $typeRemark, $picUrl){
        if($picUrl){
            $data = array(
                'typename' => $typeName,
                'remark' => $typeRemark,
                'picurl' => $picUrl
            );
        }else{
            $data = array(
                'typename' => $typeName,
                'remark' => $typeRemark,
            );
        }
        return $this->add($data);
    }

    /**
     * @param $typeId
     * @param $typeName
     * @param $typeRemark
     * @param $picUrl
     * @return bool
     * @Author: ludezh
     */
    public function updateRow($typeId, $typeName, $typeRemark, $picUrl){
        $where['typeid'] = $typeId;
        if($picUrl){
            $data = array(
                'typename' => $typeName,
                'remark' => $typeRemark,
                'picurl' => $picUrl
            );
        }else{
            $data = array(
                'typename' => $typeName,
                'remark' => $typeRemark,
            );
        }

        return $this->where($where)->save($data);
    }

    /**
     * @param $typeId
     * @return mixed
     * @Author: ludezh
     */
    public function getRow($typeId){
        $where['typeid'] = $typeId;
        return $this->where($where)->find();
    }

    /**
     * @param $id
     * @return mixed
     * @Author: ludezh
     */
    public function getNameById($id){
        $where['typeid'] = $id;
        return $this->where($where)->getField('typename');
    }
    /**
     * 获取分类
     * @return mixed
     */
    public function findTypeList(){
        $filed = array(
            'typeid',
            'typename'
        );
        return $this->field($filed)->select();
    }

    /**
     * 获取所有满足条件的列表
     * @return mixed
     */
    public function getTypeList(){
        return $this->order('typeid desc')->select();
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