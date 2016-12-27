//管理员添加/修改信息弹出框
function admin_add(aid){
	var add_admin = add_admin_url;
	if (aid) {
		add_admin += '/aid/' + aid;
        }
	parent.layer.open({
            type: 2,
            title: '添加/编辑管理员',
            shadeClose: false,
            //shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['60%', '75%'],
            content: add_admin,
            end: function() {}
        });
}

//修改管理员数据后台处理
function addAdmin_submit(){
	var adminId = $('.addAdminId').val();		//管理员ID
	//alert(adminId);return false;
	var adminname = $('.addAdminName').val(); 	//管理员用户名
	var icCardId = $('.icCardId').val(); 		//管理员身份证
	var password = $('.password').val(); 		//密码
	var password2 = $('.password2').val(); 		//确认密码
	var sex = $("input[name='sex']:checked").val(); //选中性别
	var phone = $('.phone').val(); 				//手机
	var email = $('.email').val(); 				//电子邮件
	var addressId = $('.addressId').val(); 		//居住地址
	var selectedId = $(".addSelect").find('option:selected').val(); //角色ID
	var typeSelect = $(".typeSelect").find('option:selected').val(); //类型ID

	//var selectedName = $(".addSelect").find('option:selected').text(); //获取角色的名称
	//var textarea = $('.textarea').val(); //备注信息
	// 不允许表单中的内容为空时提示一下用户
	if(adminname==""){
		//提示层
		layer.msg('请填写管理员名称');
		return false;
	}else if(icCardId==""){
		//提示层
		layer.msg('请填写身份证');
		return false;
	}else if(sex==""){
		//提示层
		layer.msg('请填写性别');
		return false;
	}else if(phone==""){
		//提示层
		layer.msg('请填写手机号码');
		return false;
	}else if(email==""){
		//提示层
		layer.msg('请填写邮箱');
		return false;
	}else if(selectedId==""){
		//提示层
		layer.msg('请选择角色');
		return false;
	}
	//判断有没有管理员的id,如果没有就是无定义新添加,要求填写密码
	if (typeof(adminId) == "undefined"){
		if(password == ""){
			//提示层
			layer.msg('请填写密码');
			return false;
		}
		if(password2 == ""){
			//提示层
			layer.msg('请填写确定密码');
			return false;
		}
		// 当密码和确认密码不一致时友好提示一下
		if(password != password2){
			//提示层
			layer.msg('密码不一致,请重新输入');
			return false;
		}
		password = hex_md5(password);
		password2 = hex_md5(password2);
	}
	//当验证完成后异步发送数据到后台处理
	$.ajax({
			url: addAdminRow_url,
			type: 'post',
			dataType: 'json',
			data:{
				adminId:adminId,adminname:adminname,password: password,
				password2: password2,sex:sex,phone:phone,email:email,
				selectedId:selectedId,addressId:addressId,icCardId:icCardId,typeSelect: typeSelect
			},
			success:function(result){
				parent.ifm.contentWindow.location.reload(true); //关闭前刷新
				if(result.status == 1){
					 layer.msg(result.info,{time: 3000},function(){
						 parent.layer.closeAll();
						 return false;
					 });
				}else if(result.status == 0){
					layer.alert(result.info);
					return false;
				}				
			}
	  	})
}

// 开启
function admin_start(obj,aid){
	layer.confirm('确 认 要 启 用 ?', function(){
		layer.closeAll('dialog'); //关闭信息框
	      $.ajax({
			url: start_admin_url,
			type: 'post',
			dataType: 'json',
			data:{aid: aid},
			success:function(result){
				parent.ifm.contentWindow.location.reload(true); //关闭前刷新
				if(result.status == 1){
					layer.msg(result.info,{time: 3000});
					return false;
				}else if(result.status == 0){
					layer.msg(result.info);
					return false;
				}				
			}
	  	})
	});
}

// 停用
function admin_stop(obj,aid){
	layer.confirm('确 认 要 停 用 ?', function(){
	layer.closeAll('dialog'); //关闭信息框
      	$.ajax({
			url: stop_admin_url,
			type: 'post',
			dataType: 'json',
			data:{aid:aid},
			success:function(result){
				parent.ifm.contentWindow.location.reload(true); //关闭前刷新
				if(result.status == 1){
					layer.msg(result.info,{time: 3000});
					return false;
				}else if(result.status == 0){
					layer.msg(result.info);
					return false;
				}
			}
  		})
    });
}

//管理员删除
function admin_del(obj,aid){
	layer.confirm('确 认 删 除 该 员 工 ?', function(){
		layer.closeAll('dialog'); //关闭信息框
	      $.ajax({
			url: del_admin_url,
			type: 'post',
			dataType: 'json',
			data:{aid:aid},
			  success:function(result){
				  parent.ifm.contentWindow.location.reload(true); //关闭前刷新
				  if(result.status == 1){
					  layer.msg(result.info,{time: 3000});
					  return false;
				  }else if(result.status == 0){
					  layer.msg(result.info);
					  return false;
				  }
			  }
	  	})
	});
}