<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/10/11 12:22
 * @Description: 描述
 */

namespace Sadmin\Controller;


use Common\Controller\BaseController;
use Think\Controller;

class AdminController extends BaseController
{
    protected $subUserModel;
    protected $result;

    public function delAdmin(){
        $uid = I('post.aid');
        if($uid){
            $subUserModel = D('User/SubUser');
            $rs = $subUserModel->deteleRow($uid);
            if($rs){
                $this->success('成 功 删 除');
                exit();
            }else{
                $this->error('删 除 失 败');
                exit();
            }
        }else{
            $this->error('请选择要删除的员工');
            exit();
        }
    }

    /**
     * 禁用员工
     * @Author: ludezh
     */
    public function stopAdmin(){
        $uid = I('post.aid');
        if($uid){
            $status = 2;
            $subUserModel = D('User/SubUser');
            $rs = $subUserModel->updateIsDefriend($uid,$status);
            if($rs){
                $this->success('成 功 禁 用');
                exit();
            }else{
                $this->error('禁 用 失 败');
                exit();
            }
        }else{
            $this->error('请选择要禁用的员工');
            exit();
        }
    }

    /**
     * 启用员工
     * @Author: ludezh
     */
    public function startAdmin(){
        $uid = I('post.aid');
        if($uid){
            $status = 1;
            $subUserModel = D('User/SubUser');
            $rs = $subUserModel->updateIsDefriend($uid,$status);
            if($rs){
                $this->success('成 功 启 用');
                exit();
            }else{
                $this->error('启 用 失 败');
                exit();
            }
        }else{
            $this->error('请选择要启用的员工');
            exit();
        }
    }

    /**
     * 新增/修改员工
     * @Author: ludezh
     */
    public function addAdminRow(){
        $adminId = I('post.adminId');
        $adminname = I('post.adminname');
        $password = I('post.password');
        $password2 = I('post.password2');
        $sex = I('post.sex');
        $phone = I('post.phone');
        $email = I('post.email');
        $selectedId = intval(I('post.selectedId'));
        $address = I('post.addressId');
        $icCardId = I('post.icCardId');
        $typeSelect = intval(I('post.typeSelect'));
        $subUserModel = D('User/SubUser');
        $adminModel = D('User/Admin');
        $parentId = $adminModel->getIdByUid(session('uid'));
        if($adminId){   //修改
            $rs = $subUserModel->updateUser($adminId,$adminname,$email,$address,$phone,$selectedId,$sex,$icCardId,$parentId,$typeSelect);
        }else{  //新增
            if(md5($password) == md5($password2)){
                $adminId = getRandStr(15);
                $registerTime = date('Y-m-d H:i:s');
                $rs = $subUserModel->addUser($adminId,$adminname,md5($password2),$email,$registerTime,$address,$phone,$selectedId,$sex,$icCardId,$parentId,$typeSelect);
            }else{
                $this->error('两次密码不一致');
                exit();
            }
        }
        if($rs){
            $this->success('操 作 成 功');
            exit();
        }else{
            $this->error('操 作 失 败');
            exit();
        }
    }

    /**
     * 加载添加/编辑管理员页面
     * @Author: ludezh
     */
    public function addAdmin(){
        $uid = I('get.aid');
        $roleMode = D('Sadmin/Role');
        $roleList = $roleMode->getRoleList();
        $typeModel = D('Sadmin/Type');
        $typeList = $typeModel->findTypeList();
        if($uid){
            $subUserModel = D('User/SubUser');
            $info = $subUserModel->getRowByUid($uid);
        }else{
            $info = '';
        }

        $this->assign('typeList',$typeList);
        $this->assign('roleList',$roleList);
        $this->assign('info',$info);
        $this->display();
    }

    /**
     *加载用户列表首页
     */
    public function adminList(){
        $subUserModel = D('User/SubUser');
        $roleModel = D('Sadmin/Role');
        $userList = $subUserModel->getUserList();
        foreach($userList as $k => $v){
            $role = $roleModel->getRow($v['roleid']);
            $userList[$k]['roleName'] = $role['rolename'];
        }
        $this->assign('userList',$userList);
        $this->display();
    }

    /**
     *ajax获取用户列表
     */
    public function userList(){
        $this->subUserModel = D('User/SubUser');
        $this->result = $this->subUserModel->getUserList();
        $this->assign('userList',$this->result);
    }

    /**
     *添加子帐号
     */
    public function addUser(){
        $uid = getRandStr(10);                  //生成用户uid
        $name = I('post.username');
        $password = md5('123456');
        $email = I('post.email');
        $registerTime = date('Y-m-ewew H:i:s');
        $address = I('post.address');
        $phone = I('post.phone');
        $roleId = I('post.roleId');
        $typeId = I('post.typeId');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $this->subUserModel = D('User/SubUser');
            $this->result = $this->subUserModel->addUser($uid,$name,$password,$email,$registerTime,$address,$phone,$roleId,$typeId);
            if($this->result){
                $this->success('添加成功');
                exit();
            }else{
                $this->error('添加失败');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }
    }

    /**
     *修改子账号
     */
    public function updateUser(){
        $uid = I('post.uid');
        $name = I('post.username');
        $email = I('post.email');
        $registerTime = date('Y-m-ewew H:i:s');
        $address = I('post.address');
        $phone = I('post.phone');
        $roleId = I('post.roleId');
        if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            $this->subUserModel = D('User/SubUser');
            $this->result = $this->subUserModel->updateUser($uid,$name,$email,$registerTime,$address,$phone,$roleId);
            if($this->result){
                $this->success('修改成功');
                exit();
            }else{
                $this->error('修改失败');
                exit();
            }
        }else{
            $this->error('手机号有误');
            exit();
        }
    }

    /**
     *删除子帐号
     */
    public function deleteUser(){
        $uid = I('post.uid');
        $phone = I('post.phone');
        if(!empty($uid) && !empty($phone)){
            $this->result = $this->subUserModel->delUser($uid,$phone);
            if($this->result){
                $this->success('删除成功');
                exit();
            }else{
                $this->error('删除失败');
                exit();
            }
        }else{
            $this->error('用户信息不合法');
            exit();
        }
    }

    /**
     *加载后台首页
     */
    public function index(){
        $adminModel = D('User/Admin');
        $info = $adminModel->findRowByUserName(session('adminTag'));
        $this->assign('info',$info);
        $this->display();
    }

    /**
    *修改密码
    */
    public function passwordEdit(){
//        $newPwd = I('post.newPwd');
//        $adminModel = D('User/Admin');
//        $rs = $adminModel->updatePwd(session('uid'),md5($newPwd));
//        if($rs){
//            $this->success('修 改 成 功');
//            exit();
//        }else{
//            $this->error('请 输 入 新 密 码');
//            exit();
//        }
        $oldPwd = I('post.oldpassword');
        $newPwd = I('post.newPassword');
        $comfirmPwd = I('post.comfirmPassword');
        if($comfirmPwd != $newPwd){
            $this->error('两 次 密 码 不 一 致');
            exit();
        }
        $adminModel = D('User/Admin');
//        $userName = session('adminTag');
        $rs = $adminModel->findRowByUid(session('uid'));
//        $this->error($rs);exit();
        if($rs['password'] == md5($oldPwd)){
            if($oldPwd != $newPwd){
                $rs2 = $adminModel->updatePwd(session('uid'),md5($newPwd));
                if($rs2){
                    session(null);
                    $this->success('修改成功');
                    exit();
                }else{
                    $this->error('修改失败');
                    exit();
                }
            }else{
                $this->error('请输入新密码');
                exit();
            }
        }else{
            $this->error('旧密码错误');
            exit();
        }
    }
}