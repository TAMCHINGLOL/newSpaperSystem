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
                $where['phone'] =  array('like',$keyword);
                $where['username'] = array('like',$keyword);
                $where['title'] = array('like',$keyword);
                $where['_logic'] = 'OR';
                $map['_complex'] = $where;                  //复合查询
                $map['ispass'] = $isPass;
            }else{
                $where['phone'] =  array('like',$keyword);
                $where['username'] = array('like',$keyword);
                $where['title'] = array('like',$keyword);
                $where['_logic'] = 'OR';
                $map['_complex'] = $where;                  //复合查询
                $map['ispass'] = $isPass;
                $map['typeid'] = $typeId;
            }
        }
        return $this->where($map)->order('savetime desc')->limit($start,$limit)->select();
    }

    /**
     * 修改论文通过状态
     * @param $uid
     * @param $artId
     * @param $isPass
     * @return bool
     */
    public function updateIsPass($uid, $artId, $isPass){
        $where['uid'] = $uid;
        $where['artid'] = $artId;
        $data['ispass'] = $isPass;
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