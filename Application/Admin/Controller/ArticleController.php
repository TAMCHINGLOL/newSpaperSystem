<?php
/**
 * @Tool: PhpStorm.
 * @Company:
 * @Author: ldz
 * @Since: 2016/10/12 16:53
 * @Description: 描述
 */

namespace Admin\Controller;


use Think\Controller;

class ArticleController extends Controller
{
    protected $articleModel;
    protected $result;

    /**
     *加载论文页面
     */
    public function index(){
        $this->display();
    }

    /**
     *ajax(dataTables服务器请求)加载论文列表
     */
    public function articleList(){
        $isPass = I('post.isPass');     //区分加载论文的状态(2级已通过,3级未通过/已通过)
        $limit = I('post.pageSize');    //总条数
        $page = I('post.curPage');      //页码
        $start = ($page - 1) * $limit;  //起始条数
        $typeId = I('post.typeId');     //分类id
        $keyword = I('post.keyword');   //关键字查询(手机号/用户名/标题)
        $keywords = '%'.$keyword.'%';
        $this->result = $this->articleModel->getArtList($start,$limit,$typeId,$keywords,$isPass);
        $response = new \stdClass();
        $response->success = true;
        $response->totalRows = count($this->result);
        $response->curPage = $page;
        $response->data = array();
        foreach($this->result as $k => $v){
            $response->data[$k] = $v['artid'];
        }
        echo json_encode($response);
//        $this->assign('artList',$this->result);
    }

    /**
     *加载论文详情页面
     */
    public function articleInfo(){
        $uid = I('post.uid');
        $artId = I('post.artId');
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->getArtByUidAndArtId($uid,$artId);
        $this->assign('artInfo',$this->result);
    }

    /**
     *是否通过审核
     */
    public function isAgreePass(){
        $isPass = I('post.isPass');
        $artId = I('post.artId');
        $uid = I('post.uid');
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->updateIsPass($uid,$artId,$isPass);
        if($this->result){
            $this->success('审核成功');
            exit();
        }else{
            $this->error('审核失败');
            exit();
        }
    }

    /**
     *是否置顶
     */
    public function setUpTop(){
        $isTop = I('post.isTop');
        $artId = I('post.artId');
        $uid = I('post.uid');
        $this->articleModel = D('User/Article');
        $this->result = $this->articleModel->updateIsTop($uid,$artId,$isTop);
        if($this->result){
            $this->success('置顶成功');
            exit();
        }else{
            $this->error('置顶失败');
            exit();
        }
    }

}