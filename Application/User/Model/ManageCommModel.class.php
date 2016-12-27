<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/12/1 16:18
 * @Description: 描述记录管理员审核登记
 */

namespace User\Model;


use Think\Model;

class ManageCommModel extends Model
{
    protected $tableName = 'manage_comment';

    /**
     * @param $uid
     * @param $name
     * @param $roleId
     * @param $artId
     * @param $grad
     * @param $discuss
     * @return bool|mixed
     * @Author: ludezh
     */
    public function addCommentByStaff($uid, $name, $roleId, $artId, $grad, $discuss){
        if($roleId == 3){           //副主管执行添加
            $data['artid'] = $artId;
            $data['oneuid'] = $uid;
            $data['onename'] = $name;
            $data['onegrade'] = $grad;
            $data['onediscuss'] = $discuss;
            $rs = $this->add($data);
        }else{                  //主管执行更新
            $where['artid'] = $artId;
            $data['towuid'] = $uid;
            $data['towname'] = $name;
            $data['twograde'] = $grad;
            $data['towdiscuss'] = $discuss;
            $rs = $this->where($where)->save($data);
        }
        return $rs;
    }

    /**
     * @param $id
     * @return mixed
     * @Author: ludezh
     */
    public function getRowByArtId($id){
        $where['artid'] = $id;
        return $this->where($where)->find();
    }
}