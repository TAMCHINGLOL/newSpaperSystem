function payEdit(module_code){
	var payModule_submit_url = payEdit_submit_url;
	if (module_code) {
		payModule_submit_url += '/code/' + module_code;
    }
	parent.layer.open({
            type: 2,
            title: '编辑支付方式',
            shadeClose: true,
            shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: payModule_submit_url,
            end: function() {}
        });
}

function payInstall_submit_url(module_code){
        var payModule_submit_url = payInstall_submit_url;
        if (module_code) {
                payModule_submit_url += '/code/' + module_code;
        }
        parent.layer.open({
                type: 2,
                title: '安装支付方式',
                shadeClose: true,
                shade: true,
                scrollbar: false,
                maxmin: true, //开启最大化最小化按钮
                area: ['90%', '90%'],
                content: payModule_submit_url,
                end: function() {}
        });
}

// 异步将数据提交至后台
function pay_submit(){
    alert("hello");
  var pay_name = $('#pay_name').val();  //支付方式名称
  var pay_desc = $('#pay_desc').val();  //支付方式描述
  var pay_fee = $('#pay_fee').val();    //支付手续费
  var pay_order = $('#pay_order').val(); //支付排序
  var is_psw = $('#is_psw').val(); //是否需要密码
  var is_cod = $('#is_cod').val(); //是否货到付款
  var is_online = $('#is_online').val(); //是否在线支付 
  
}


// 支付安装
function payInstall(module_code){
    // alert(module_code);
    // return false;
    var payModule_submit_url = payInstall_submit_url;
    if (module_code) {
        payModule_submit_url += '/code/' + module_code;
    }
    parent.layer.open({
            type: 2,
            title: '安装/编辑支付方式',
            shadeClose: true,
            shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: payModule_submit_url,
            end: function() {}
        });
}

// 卸载安装
function payUninstall(module_code){
    var payModule_submit_url = payUninstall_submit_url;
    if (module_code) {
        payModule_submit_url += '/code/' + module_code;
    }
    $.ajax({
          url: payModule_submit_url, // 编辑安装发送地址
          type: 'post',
          dataType: 'json',
          success:function(result){
            parent.ifm.contentWindow.location.reload(true); //关闭前刷新
            layer.msg("卸载成功");
            
          }
      })
}
