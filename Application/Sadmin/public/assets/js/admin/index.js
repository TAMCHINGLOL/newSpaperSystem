// 点击用户退出时,ajax不带数据传到控制器摧毁SESSION
function userquit(){
	// alert("nihao");
	$.ajax({
          url: admin_destorySession_url, //摧毁Session地址
          type: 'post',
          dataType: 'json',
          // data:{},
          success:function(result){
            if(result.destoried=="yes"){  //当密码和确认密码正确时;
              layer.msg('退出成功,正在返回登录界面');
              setTimeout("window.location.href = admin_loginOut_url;",1000);
            }
          }
      });
}