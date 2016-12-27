<?php
/**
 * @Tool: PhpStorm.
 * @Company: sunaw
 * @Author: ldz
 * @Since: 2016/11/16 21:45
 * @Description: 描述
 */

namespace Common\Controller;


use Think\Controller;

class BaseController extends Controller
{
    public function _initialize(){
        header("Content-type: text/html; charset=utf-8");  //把所有的头文件都设置字符编码为utf-8;
        if($_SESSION['adminuid'] == null || !isset($_SESSION['adminuid'])){
            session(null);
//             $this->error('登录已过期,正在跳转...','Index.php/Home/Login/Index.html',2);
            $this->redirect('/Sadmin/Index/login');
//            $this- redirect('Index.php/Home/Login/Index.html');
            exit();
        }
    }
}