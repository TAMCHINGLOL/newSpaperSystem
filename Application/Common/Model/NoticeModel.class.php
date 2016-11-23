<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/13 22:54
 * @Description: 描述
 */

namespace Common\Model;


use Think\Model;

class NoticeModel extends Model
{
    protected $tableName = 'notice';

    /**
     * 获取所有公告
     * @return mixed
     */
    public function getAllRow(){
        return $this->select();
    }

    /**添加公告
     * @param $nid
     * @param $title
     * @param $content
     * @param $pushTime
     * @param $outTime
     * @param $isSend
     * @param $status
     * @return mixed
     */
    public function addRow($nid, $title, $content, $pushTime, $outTime, $isSend, $status){
        $data = array(
            'nid' => $nid,
            'title' => $title,
            'content' => $content,
            'pushtime' => $pushTime,
            'outtime' => $outTime,
            'issend' => $isSend,
            'status' => $status
        );
        return $this->add($data);
    }

    /**
     * 更新公告
     * @param $nid
     * @param $title
     * @param $content
     * @param $pushTime
     * @param $outTime
     * @param $isSend
     * @param $status
     * @return bool
     */
    public function updateRow($nid, $title, $content, $pushTime, $outTime, $isSend, $status){
        $where['nid'] = $nid;
        $data = array(
            'title' => $title,
            'content' => $content,
            'pushtime' => $pushTime,
            'outtime' => $outTime,
            'issend' => $isSend,
            'status' => $status
        );
        return $this->where($where)->save($data);
    }

    /**
     * 删除公告
     * @param $nid
     * @return mixed
     */
    public function delRow($nid){
        $where['nid'] = $nid;
        return $this->where($where)->delete();
    }
}