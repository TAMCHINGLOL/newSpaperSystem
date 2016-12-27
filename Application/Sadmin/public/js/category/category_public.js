//提交按钮
$("#submit_button").click(function(){
    var categoryName = $('#category-name').val();
    var keyWord = $('#keyWord').val();
    var sortNumber = $('#sortNumber').val();
    //var checkText=$("#category-id").find("option:selected").text();  //获取Select选择的Text
    var checkText=$("#category-id").val();//获取Select选择的值
    if(isNaN(sortNumber)){
    	layer.alert("排序号必须是数字");
    	return false;
    }
    if(checkText==""){
    	layer.alert("上级目录不能为空");
    	return false;
    }
    //ajax发数据前往后台处理
    $.ajax({
          url: category_add_url, //分类控制器接收数据地址
          type: 'post',
          dataType: 'json',
          data:{categoryName:categoryName,keyWord:keyWord,sortNumber:sortNumber,checkText:checkText},
          success:function(result){
            if(result.addCategory=="yes"){ //用户名存在时
            	layer.alert("添加分类成功");
            	//当你在iframe页面关闭自身时
			    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
			    parent.layer.close(index); //再执行关闭
			    location.reload();	//让页面重新刷新
            }
          }
      })
});

//取消按钮
function category_cancer(){
    //当你在iframe页面关闭自身时
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    parent.layer.close(index); //再执行关闭
}
