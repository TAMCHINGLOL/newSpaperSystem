<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/13 23:55
 * @Description: 描述
 */

namespace Admin\Model;


use Think\Model;

class CommentModel extends Model
{
    protected $tableName = 'comment';

    /**
     * 添加评论
     * @param $artId
     * @param $aId
     * @param $wId
     * @param $content
     * @param $addTime
     * @return mixed
     */
    public function addRow($artId, $aId, $wId, $content, $addTime){
        $data = array(
            'artid' => $artId,
            'aid' => $aId,
            'wid' => $wId,
            'content' => $content,
            'addtime' => $addTime
        );
        return $this->add($data);
    }

    /**
     * 查找自己评论别人的记录
     * @param $wid
     * @return mixed
     */
    public function findSelfRow($wid){
        $where['wid'] = $wid;
        return $this->where($where)->order('addtime desc')->select();
    }

    /**
     * 查找别人评论别人的记录
     * @param $uid
     * @return mixed
     */
    public function findOtherRow($uid){
        $where['uid'] = $uid;
        return $this->where($where)->order('addtime desc')->select();
    }
}