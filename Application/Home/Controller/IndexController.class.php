<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    /**
     *加载首页
     */
    public function index(){
        $homePicModel = D('Sadmin/HomePic');
        $typeModel = D('Sadmin/Type');
        $articleModel = D('User/Article');
        $picList = $homePicModel->getHomeList(0,5);
        foreach($picList as $k => $v){
            $picList[$k]['picurl'] = substr($v['picurl'], strrpos($v['picurl'], '../')+2);
        }
        $artList = $articleModel->getHomeList(0,5);
        foreach($artList as $k => $v){
//            echo ;exit();
//            $articleList[$k]['content'] = html_entity_decode($v['content']);
            $content1 = strip_tags(html_entity_decode($v['content']));
            $artList[$k]['content'] = $content1."...........";
            $picurl = $typeModel->getPicByTypeId($v['typeid']);
            $artList[$k]['picurl'] = substr($picurl['picurl'], strrpos($picurl['picurl'], '../')+2);
            $artList[$k]['picname'] = $picurl['typename'];
        }
        $typeList = $typeModel->getHomeList(0,4);
        foreach($typeList as $k => $v){
            $typeList[$k]['picurl'] = substr($v['picurl'], strrpos($v['picurl'], '../')+2);
        }
        $this->assign('picList',$picList);
        $this->assign('artList',$artList);
        $this->assign('typeList',$typeList);
        $this->display();
    }

    /**
     *退出登录
     */
    public function exitLogin(){
        session(null);
        $this->redirect('Home/Index/Index');
    }
}