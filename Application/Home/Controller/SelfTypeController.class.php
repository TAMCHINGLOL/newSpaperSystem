<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: zml
 * @Since: 2016/11/27 20:13
 * @Description: 描述
 */

namespace Home\Controller;


use Common\Controller\CommonController;

class SelfTypeController extends CommonController
{
    public function addType(){
        $typeName = I('post.typename');
        $uid = session('uid');
        $selfTypeModel = D('Common/SelfType');
        $result = $selfTypeModel->isExist($uid,$typeName);
        if($result){
            $this->error('分 类 已 存 在');
            exit();
        }
        $rs = $selfTypeModel->addRow($uid,$typeName);
        if($rs){
            $data[0] = '添 加 成 功';
            $data[1] = $typeName;
            $data[2] = $rs;
            $this->success($data);
            exit();
        }else{
            $this->error('添 加 失 败');
            exit();
        }
    }
}