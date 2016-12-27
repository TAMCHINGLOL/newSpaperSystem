//加载编辑/添加弹窗
function admin_role_add(rid){
	var role_add_url = role_add_submit_url;
	if (rid) {
		role_add_url += '/roleId/' + rid;
        }
	parent.layer.open({
            type: 2,
            title: '添加/编辑角色',
            shadeClose: true,
            //shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['58%', '70%'],
            content: role_add_url,
            end: function() {}
        });
}

// 提交添加/修改角色按钮触发事件
function addAdmin(){
	var roleId = $('.roleId').val();     		//角色id
	var roleName = $('.roleName').val();     	//角色名称
	var roleDescript = $('.roleDescript').val();//角色描述
	if(roleName==""||roleDescript==""){
		layer.msg('角色名称或角色描述不能为空');
		return false;
	}
	var chk_value =[];						//拿一个数组接收被选中的值
	$('input[name="form-field-checkbox"]:checked').each(function(){
		chk_value.push($(this).val()); 		//将值存放到数组中
	});
	if(chk_value.length < 1){
		layer.msg('请给当前角色分配相应的权限');
		return false;
	}
	//将角色名称、角色描述和所选的规则权限提交到后台
	$.ajax({
		  url: role_add_roleOper_url, 	//管理员用户名检测地址
		  type: 'post',
		  dataType: 'json',
		  data:{roleId:roleId,roleName:roleName,roleDescript:roleDescript,chk_value:chk_value},
		  success:function(result){
			parent.ifm.contentWindow.location.reload(true); //关闭前刷新
			if(result.status == 1){
				layer.msg(result.info,{time: 2000},function(){
					parent.layer.closeAll();
					return false;
				});
			}else if(result.status == 0){
				layer.alert(result.info,{icon: 6});
				return false;
			 }
		  }
	  });
}

//删除角色按钮时触发事件
function admin_role_del(obj,rid){
	layer.confirm('确认要删除该角色?', function(){
		$.ajax({
			url: del_role_url,
			type: 'post',
			dataType: 'json',
			data:{roleId:rid},
			success:function(result){
				parent.ifm.contentWindow.location.reload(true); //关闭前刷新
				if(result.status == 1){
					layer.msg(result.info ,{time: 3000});
					return false;
				}else if(result.status == 0){
					layer.alert(result.info,{icon: 6});
					return false;
				}
			}
		});
	});
}
