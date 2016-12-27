<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/12 16:55
 * @Description: 描述
 */

namespace User\Model;


use Think\Model;

class ArticleModel extends Model
{
    protected $tableName = 'article';

    /**
     * @param $uid
     * @param $artId
     * @param $isPass
     * @param $delatime
     * @return bool
     * @Author: ludezh
     */
    public function updateIsPassByUid($uid, $artId, $isPass, $delatime){
        $where['uid'] = $uid;
        $where['artid'] = $artId;
        $data['ispass'] = $isPass;
        $data['passtime'] = $delatime;
        return $this->where($where)->save($data);
    }
    /**
     * @param int $start
     * @param int $limit
     * @return mixed
     * @Author: ludezh
     */
    public function getHomeList($start = 0, $limit = 5){
        $where['ispass'] = 3;
        $where['status'] = 2;
        $where['istop'] = 2;
        $where['isbox'] = 2;
        return $this->where($where)->limit($start,$limit)->select();
    }

    /**
     * @param $artId
     * @param $status
     * @return bool
     * @Author: ludezh
     */
    public function updateIsTop1($artId, $status){
        $where['artid'] = $artId;
        $data['istop'] = $status;
        return $this->where($where)->save($data);
    }

    /**
     * 获取优文箱列表
     * @return mixed
     * @Author: ludezh
     */
    public function getIsBoxList(){
        $where['isbox'] = 2;
        $where['status'] = 2;
        $where['ispass'] = 3;
        return $this->where($where)->select();
    }

    /**
     * @param $artId
     * @param $status
     * @return bool
     * @Author: ludezh
     */
    public function isBoxRow($artId, $status){
        $where['artid'] = $artId;
        $data['isbox'] = $status;
        return $this->where($where)->save($data);
    }

    /**
     * @param $artId
     * @param $status
     * @return bool
     * @Author: ludezh
     */
    public function updatePassByArtId($artId, $status){
        $where['artid'] = $artId;
        $data['ispass'] = $status;
        return $this->where($where)->save($data);
    }

    /**
     * @param $status
     * @param $isPass
     * @param $typeId
     * @return mixed
     * @Author: ludezh
     */
    public function getListCountByCondition($status, $isPass, $typeId){
        $where['status'] = $status;
        $where['ispass'] = $isPass;
        if($typeId != '' && $typeId != 1){
            $where['typeid'] = $typeId;
        }
        $count = $this->where($where)->count();
        return $count;
    }
    /**
     * @param $start
     * @param $limit
     * @param $status
     * @param $isPass
     * @param $typeId
     * @return mixed
     * @Author: ludezh
     */
    public function getListByCondition($start, $limit, $status, $isPass, $typeId){
        $where['status'] = $status;
        $where['ispass'] = $isPass;
        if($typeId != '' && $typeId != 1){
            $where['typeid'] = $typeId;
        }
        $list = $this->field(true)->where($where)->order('id desc')->limit($start, $limit)->select();
//        $count = $this->where($where)->count();
//        $data['list'] = $list;
//        $data['count'] = $count;
        return $list;
    }

    /**
     * @param $uid
     * @param $isPass
     * @param $status
     * @param int $typeId
     * @return mixed
     * @Author: ludezh
     */
    public function getCount($uid, $isPass, $status, $typeId = 0){
        $where['uid'] = $uid;
        $where['status'] = $status;
        if($isPass){
            $where['ispass'] = $isPass;
        }
        if($typeId){
            $where['self_typeid'] = $typeId;
        }
        return $this->where($where)->count();
    }

    /**
     * @param $start
     * @param $limit
     * @param $uid
     * @param $isPass
     * @param $status
     * @param int $typeId
     * @return mixed
     * @Author: ludezh
     */
    public function getPassedList($start, $limit, $uid, $isPass, $status, $typeId = 0){
        $where['uid'] = $uid;
        $where['status'] = $status;
        if($isPass){
            $where['ispass'] = $isPass;
        }
        if($typeId){
            $where['self_typeid'] = $typeId;
        }
        return $this->where($where)->order('savetime desc')->limit($start,$limit)->select();
    }
    /**
     * @param $uid
     * @param $isPass
     * @param $status
     * @return mixed
     * @Author: ludezh
     */
    public function getAllPassedList($uid, $isPass, $status){
        $where['uid'] = $uid;
        $where['ispass'] = $isPass;
        $where['status'] = $status;
        return $this->where($where)->order('savetime desc')->select();
    }

    /**
     * @param $artId
     * @param $uid
     * @param $title
     * @param $content
     * @param $typeId
     * @param $saveTime
     * @param $status
     * @param $selfTypeId
     * @param $tag
     * @param $isOpen
     * @param $isPass
     * @return bool
     * @Author: ludezh
     */
    public function updateRow($artId, $uid, $title, $content, $typeId, $saveTime, $status, $selfTypeId, $tag, $isOpen, $isPass){
        $where['artid'] = $artId;
        $where['uid'] = $uid;
        $data = array(
            'title' => $title,
            'content' => $content,
            'typeid' => $typeId,
            'savetime' => $saveTime,
            'status' => $status,
            'self_typeid' => $selfTypeId,
            'tag' => $tag,
            'isopen' => $isOpen,
            'ispass' => $isPass,
        );
        return $this->where($where)->save($data);
    }

    /**
     * @param $artId
     * @return mixed
     * @Author: ludezh
     */
    public function getRowByArtId($artId){
        $where['artid'] = $artId;
        $filed = array(
            'artid',
            'uid',
            'title',
            'content',
            'typeid',
            'tag',
            'sendtime'
        );
        return $this->field($filed)->where($where)->find();
    }

    /**
     * @param $artId
     * @return mixed
     * @Author: ludezh
     */
    public function findRow($artId){
        return $this->where(array('artid' => $artId))->find();
    }
    /**
     * @param $uid
     * @param $aId
     * @param $status
     * @return bool
     */
    public function delRow($uid, $aId, $status){
        $where['uid'] = $uid;
        $where['artid'] = $aId;
        $data['status'] = $status;
        return $this->where($where)->save($data);
    }

    /**
     * @param $uid
     * @param $aId
     * @param $status
     * @param $typeId
     * @param $sendTime
     * @param $isPass
     * @return bool
     */
    public function sureRow($uid, $aId, $status, $typeId, $sendTime, $isPass, $isOpen){
        $where['uid'] = $uid;
        $where['artid'] = $aId;
        $data['status'] = $status;
        $data['typeid'] = $typeId;
        $data['sendtime'] = $sendTime;
        $data['ispass'] = $isPass;
        $data['isopen'] = $isOpen;
        return $this->where($where)->save($data);
    }

    /**
     * @param $uid
     * @param $aId
     * @param $status
     * @param $isPass
     * @return mixed
     */
    public function cancelRow($uid, $aId, $status, $isPass){
        $where['uid'] = $uid;
        $where['artid'] = $aId;
        $data['status'] = $status;
        $data['ispass'] = $isPass;
        return $this->where($where)->save($data);
    }

    /**
     * @param $uid
     * @param $status
     * @param int $selfTypeId
     * @return mixed
     */
    public function getRows($uid, $status, $selfTypeId = 0){
        if(empty($selfTypeId)){
            $where = array(
                'uid' => $uid,
                'status' => $status,
            );
        }else{
            $where = array(
                'uid' => $uid,
                'status' => $status,
                'self_typeid' => $selfTypeId
            );
        }
        return $this->where($where)->order('savetime desc')->select();
    }

    /**
     * 添加文章
     * @param $artId
     * @param $uid
     * @param $phone
     * @param $username
     * @param $title
     * @param $content
     * @param $typeId
     * @param $saveTime
     * @param $sendTime
     * @param $status
     * @param $selfTypeId
     * @param $tag
     * @param $isOpen
     * @return mixed
     */
    public function addRow($artId, $uid, $phone, $username, $title, $content, $typeId, $saveTime, $sendTime, $status, $selfTypeId, $tag, $isOpen){
        $data = array(
            'artid' => $artId,
            'uid' => $uid,
            'phone' => $phone,
            'username' => $username,
            'title' => $title,
            'content' => $content,
            'typeid' => $typeId,
            'savetime' => $saveTime,
            'sendtime' => $sendTime,
            'status' => $status,
            'self_typeid' => $selfTypeId,
            'tag' => $tag,
            'isopen' => $isOpen,
        );
        if($status == 2){
            $data['ispass'] = 5;
            $data['isopen'] = 1;
        }
        return $this->add($data);
    }
    /**
     * 更新论文点赞量
     * @param $artId
     * @param $num
     * @return bool
     */
    public function updateClickNum($artId, $num){
        $where['artid'] = $artId;
        $data['clicknum'] = $num;
        return $this->where($where)->save($data);
    }

    /**
     * 更新论文阅读量
     * @param $artId
     * @param $num
     * @return bool
     */
    public function updateReadNum($artId, $num){
        $where['artid'] = $artId;
        $data['readnum'] = $num;
        return $this->where($where)->save($data);
    }

    /**
     * 更新论文分数
     * @param $artId
     * @param $grade
     * @return bool
     */
    public function updateGrade($artId, $grade){
        $where['artid'] = $artId;
        $data['grade'] = $grade;
        return $this->where($where)->save($data);
    }

    /**
     * 根据条件查询最新时间的论文列表(默认10条)
     * @param $start
     * @param $limit
     * @param $typeId
     * @param $keyword
     * @param $isPass
     * @return mixed
     */
    public function getArtList($start, $limit, $typeId, $keyword, $isPass){
        if(empty($typeId) && empty($keyword)){
            $map['ispass'] = $isPass;
        }else{
            if(!empty($typeId) && empty($keyword)){
                $map['ispass'] = $isPass;
                $map['typeid'] = $typeId;
            }else if(empty($typeId) && !empty($keyword)){
//                $where['phone'] =  array('like',$keyword);
                $where['artid'] =  array('like','%'.$keyword.'%');
                $where['username'] = array('like','%'.$keyword.'%');
                $where['title'] = array('like','%'.$keyword.'%');
                $where['_logic'] = 'OR';
                $map['_complex'] = $where;                  //复合查询
                $map['ispass'] = $isPass;
            }else{
//                $where['phone'] =  array('like',$keyword);
                $where['artid'] =  array('like','%'.$keyword.'%');
                $where['username'] = array('like','%'.$keyword.'%');
                $where['title'] = array('like','%'.$keyword.'%');
                $where['_logic'] = 'OR';
                $map['_complex'] = $where;                  //复合查询
                $map['ispass'] = $isPass;
                $map['typeid'] = $typeId;
            }
        }
        $map['status'] = 2;
        $list = $this->where($map)->order('savetime desc')->limit($start,$limit)->select();
        $count = $this->where($map)->count();
        $data = array(
            'list' => $list,
            'count' => $count
        );
        return $data;
    }

    /**
     * 修改论文通过状态
     * @param $uid
     * @param $artId
     * @param $isPass
     * @param $passTime
     * @return bool
     */
    public function updateIsPass($uid, $artId, $isPass, $passTime){
        $where['uid'] = $uid;
        $where['artid'] = $artId;
        $data['ispass'] = $isPass;
        if($passTime){
            $data['passtime'] = $passTime;
        }
        return $this->where($where)->save($data);
    }

    /**
     * 修改论文置顶状态
     * @param $uid
     * @param $artId
     * @param $isTop
     * @return bool
     */
    public function updateIsTop($uid, $artId, $isTop){
        $where['uid'] = $uid;
        $where['artid'] = $artId;
        $data['istop'] = $isTop;
        return $this->where($where)->save($data);
    }
}