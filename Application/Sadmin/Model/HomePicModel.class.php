<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/12/4 16:40
 * @Description: 描述
 */

namespace Sadmin\Model;


use Think\Model;

class HomePicModel extends Model
{
    protected $tableName = 'home_pic';

    /**
     * @param int $start
     * @param int $limit
     * @return mixed
     * @Author: ludezh
     */
    public function getHomeList($start = 0, $limit = 4){
        return $this->limit($start,$limit)->select();
    }

    /**
     * @param $id
     * @return mixed
     * @Author: ludezh
     */
    public function delRow($id){
        $where['id'] = $id;
        return $this->where($where)->delete();
    }

    /**
     * @param $id
     * @param $typeId
     * @param $picUrl
     * @param $remark
     * @return bool
     * @Author: ludezh
     */
    public function updateRow($id, $typeId, $picUrl, $remark){
        $where['id'] = $id;
        $data['typeid'] = $typeId;
        $data['picurl'] = $picUrl;
        $data['remark'] = $remark;
        return $this->where($where)->save($data);
    }

    /**
     * @param $typeId
     * @param $picUrl
     * @param $remark
     * @return mixed
     * @Author: ludezh
     */
    public function addRow($typeId, $picUrl, $remark){
        $data['typeid'] = $typeId;
        $data['picurl'] = $picUrl;
        $data['remark'] = $remark;
        return $this->add($data);
    }

    /**
     * @param $id
     * @return mixed
     * @Author: ludezh
     */
    public function getRowById($id){
        $where['id'] = $id;
        return $this->where($where)->find();
    }

    /**
     * @return mixed
     * @Author: ludezh
     */
    public function getRows(){
        return $this->select();
    }


}