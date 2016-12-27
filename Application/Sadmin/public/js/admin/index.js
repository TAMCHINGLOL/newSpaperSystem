// 点击用户退出时,ajax不带数据传到控制器摧毁SESSION
function userquit(){
	 //alert("nihao"); return false;
	$.ajax({
          url: admin_exitLogin_url, //摧毁Session地址
          type: 'post',
          dataType: 'json',
          success:function(result){
            if(result.status == 1){  //当密码和确认密码正确时;
                layer.msg(result.info,{time: 3000},function(){
                    window.location.href = admin_loginIndex_url;
                });
            }
          }
      });
}


//修改管理员密码
function passwordEdit(){
    parent.layer.open({
        type: 2,
        title: '修 改 密 码',
        shadeClose: true,
        //shade: false,
        scrollbar: false,
        maxmin: false, //开启最大化最小化按钮
        area: ['25%', '43%'],
        content: Password_url,
        end: function() {}
    });
}

//提交按钮
$("#submit_button").click(function(){
    var oldpassword = $('.oldpassword').val();
    var newPassword = $('.newPassword').val();
    var comfirmPassword = $('.comfirmPassword').val();
    if(oldpassword==""||newPassword==""||comfirmPassword==""){
    //提示层
    layer.msg('请填写完整密码信息');
    return false;
    }
    if(newPassword != comfirmPassword){
    //提示层
    layer.msg('两 次 密 码 不 一 致');
    return false;
    }
    //当验证完成后异步发送数据到后台处理
    $.ajax({
      url: password_edit_url,
      type: 'post',
      dataType: 'json',
      data:{oldpassword:hex_md5(oldpassword),newPassword:hex_md5(newPassword),comfirmPassword:hex_md5(comfirmPassword)},
      success:function(result){
        if(result.status == 1){
            layer.msg('修 改 成 功 , 请 重 新 登 录',{time: 3000},function(){
                //parent.layer.closeAll();
                window.location.href = admin_loginIndex_url;
                //return false;
            });
            //return false;
        }else if(result.status == 0){
          layer.alert(result.info);
          return false;
        }       
      }
    })
});

//取消按钮
function password_cancer(){
    //当你在iframe页面关闭自身时
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    parent.layer.close(index); //再执行关闭
}