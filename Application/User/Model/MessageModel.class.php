<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/11 18:07
 * @Description: 描述
 */

namespace User\Model;


use Think\Model;

class MessageModel extends Model
{
    protected $tableName = 'message';

    /**
     * 根据用户id和id查找该记录详情
     * @param $uid
     * @param $id
     * @return mixed
     */
    public function findInfoByUidAndId($uid, $id){
        $where['uid'] = $uid;
        $where['id'] = $id;
        return $this->where($where)->find();
    }

    /**
     * 根据用户id和状态查询记录
     * @param $uid
     * @param $status
     * @return mixed
     */
    public function findRowByUidAndStatus($uid, $status){
        $where['uid'] = $uid;
        $where['status'] = $status;
        return $this->where($where)->select();
    }

    /**
     * 修改(聘任)消息
     * @param $id
     * @param $uid
     * @param $status
     * @param $title
     * @param $content
     * @param $pushTime
     * @param $outTime
     * @return bool
     */
    public function updateMessage($id, $uid, $status, $title, $content, $pushTime, $outTime){
        $where['id'] = $id;
        $where['uid'] = $uid;
        $data = array(
            'status' => $status,
            'title' => $title,
            'content' => $content,
            'pushtime' => $pushTime,
            'outtime' => $outTime
        );
        return $this->where($where)->save($data);
    }

    /**
     * 添加(聘任)消息
     * @param $uid
     * @param $title
     * @param $content
     * @param $pushTime
     * @param $outTime
     * @return mixed
     */
    public function addMessage($uid, $title, $content, $pushTime, $outTime){
        $data = array(
            'uid' => $uid,
            'title' => $title,
            'content' => $content,
            'pushtime' => $pushTime,
            'outtime' => $outTime
        );
        return $this->add($data);
    }

    /**
     * 取消(聘任)消息
     * @param $id
     * @param $uid
     * @return mixed
     */
    public function cancelMessage($id, $uid){
        $where['id'] = $id;
        $where['uid'] = $uid;
        return $this->where($where)->delete();
    }

    /**
     * 修改消息阅读状态
     * @param $id
     * @param $uid
     * @param $status
     * @return bool
     */
    public function updateStatus($id, $uid, $status){
        $where['id'] = $id;
        $where['uid'] = $uid;
        $data['status'] = $status;
        return $this->where($where)->save($data);
    }

}