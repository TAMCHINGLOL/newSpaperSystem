<?php 

 //把这个方法写入到tp中
    public function public_upload(){
        set_time_limit(0);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 30*1024*1024 ;// 设置附件上传大小
        $upload->allowExts = array('mp3','wma');// 设置附件上传类型
        $Path=M('config')->getFieldByVarname('sitefileurl','value');
        $upload->rootPath = './d/file/mp3/'; // 设置附件上传根目录
        // 上传文件 
        $info = current($upload->upload());
        // print_r($info);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            echo $Path.'mp3/'.$info['savepath'].$info['savename'];
            exit;
        }
    }






 ?>