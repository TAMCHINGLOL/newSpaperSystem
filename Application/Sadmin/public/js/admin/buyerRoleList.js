function admin_role_add(rid){
	var role_add_url = role_add_submit_url;
	if (rid) {
		role_add_url += '/template_id/' + rid;
        }
	parent.layer.open({
            type: 2,
            title: '添加/编辑角色',
            shadeClose: true,
            shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: role_add_url,
            end: function() {}
        });
}

// 提交添加/修改角色按钮时产生的js
function admin_role_add_submit(){
	var roleId = $('.roleId').val();     //角色id
	var roleName = $('.roleName').val();     //角色名称
	
 	if(roleName==""){
		layer.msg('角色名称不能为空');
		return false;
	}
	var chk_value =[];//拿一个数组接收被选中的值
	$('input[name="form-field-checkbox"]:checked').each(function(){
	chk_value.push($(this).val()); //将值存放到数组中
	});
	// alert(chk_value);
	// return false;
	if(chk_value.length<=0){
		layer.msg('请给当前角色分配相应的权限');
		return false;
	}
	//将角色名称、角色描述和所选的规则权限提交到后台
		$.ajax({
	          url: role_add_submit_url, //管理员用户名检测地址
	          type: 'post',
	          dataType: 'json',
	          data:{roleId:roleId,roleName:roleName,chk_value:chk_value},
	          success:function(result){
	          	parent.ifm.contentWindow.location.reload(true); //关闭前刷新
	            if(result.success=="yes"){ //用户名存在时
	            	 layer.msg('啊哈,恭喜操作成功');
          			setTimeout("parent.layer.closeAll()", 2000)
					
	            }else if(result.success=="no"){ //用户名不存在时
	              	layer.msg('对不起,该角色名或者已选权限规则已存在,请更改后再试');
					return false;
	             }
	          }
	      })
}

// 删除角色按钮时产生的js
function admin_role_del(obj,rid){
	layer.confirm('确认要删除该角色吗', function(){
		$.ajax({
			url: del_role_url,
			type: 'post',
			dataType: 'json',
			data:{'rid':rid},
			success:function(result){
				if(result.deleted=="yes"){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else if(result.deleted=="no"){
					layer.msg('操作失败');
				}
			}
		})
	});
}
