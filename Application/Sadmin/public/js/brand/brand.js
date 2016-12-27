
//类别发布/编辑弹出窗口
function brand_add_edit(bid){
  var brandAddEdit_url = Brand_url;
    if(bid){
      brandAddEdit_url += '/template_id/' + bid;
    }
    parent.layer.open({
        type: 2,
        title: '添加/编辑品牌管理',
        shadeClose: true,
        shade: true,
        scrollbar: false,
        maxmin: true, //开启最大化最小化按钮
        area: ['90%', '90%'],
        content: brandAddEdit_url,
        end: function() {}
    });
}

//提交按钮
$("#submit_button").click(function(){
    var brandId = $('.brandId').val();
    var brandCode = $('.brandCode').val();
    var brandName = $('.brandName').val();
    var brandSort = $('.brandSort').val();
    if(brandCode==""||brandName==""){
    //提示层
    layer.msg('信息填写不完整,添加失败');
    return false;
    }
    if(brandSort){
        if(isNaN(brandSort)||brandSort<0){
          layer.alert("排序号必须是非负数");
          return false;
        }
    }
    //当验证完成后异步发送数据到后台处理
    $.ajax({
      url: brand_add_edit_url,
      type: 'post',
      dataType: 'json',
      data:{brandId:brandId,brandCode:brandCode,brandName:brandName,brandSort:brandSort},
      success:function(result){
        parent.ifm.contentWindow.location.reload(true); //关闭前刷新
        if(result.status==1){
          layer.msg(result.info);
          setTimeout("parent.layer.closeAll()", 2000)
        }else if(result.status==0){
          layer.msg("操作失败,"+result.info);
          return false;
        }       
      }
    })
});

//取消按钮
function brand_cancer(){
    //当你在iframe页面关闭自身时
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    parent.layer.close(index); //再执行关闭
}


//品牌删除
function brand_del(brandUid){
  layer.confirm('确认要删除该品牌吗', function(){
    layer.closeAll('dialog'); //关闭信息框
      $.ajax({
        url: del_brand_url,
        type: 'post',
        dataType: 'json',
        data:{'brandUid':brandUid},
        success:function(result){
          if(result.status==1){                   
              layer.msg(result.info);
              location.reload(); //让页面重新刷新               
          }else if(result.status==0){
              layer.msg("操作失败"+result.info);
              return false;
          }       
        }
      })
  });
}
