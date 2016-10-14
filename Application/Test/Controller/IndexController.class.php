<?php
namespace Test\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $res = sendTemplateSMS('13144490855',array('123456789','2'),'1');
        print_r($res);
        exit();
    }
}