<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/13 23:43
 * @Description: 描述
 */

namespace Admin\Model;


use Think\Model;

class CollectModel extends Model
{
    protected $tableName = 'collect';

    /**
     * 根据用户id查找所有收藏
     * @param $uid
     * @return mixed
     */
    public function findRowByUid($uid){
        $where['uid'] = $uid;
        return $this->where($where)->order('collecttime desc')->select();
    }

    /**
     * 添加新的收藏
     * @param $artId
     * @param $aid
     * @param $uid
     * @param $title
     * @param $url
     * @param $collectTime
     * @return mixed
     */
    public function addRow($artId, $aid, $uid, $title, $url, $collectTime){
        $data = array(
            'artid' => $artId,
            'aid' => $aid,
            'uid' => $uid,
            'title' => $title,
            'url' => $url,
            'collecttime' => $collectTime
        );
        return $this->add($data);
    }

    /**
     * 取消收藏
     * @param $id
     * @param $uid
     * @return mixed
     */
    public function deleteRow($id, $uid){
        $where['id'] = $id;
        $where['uid'] = $uid;
        return $this->where($where)->delete();
    }

}