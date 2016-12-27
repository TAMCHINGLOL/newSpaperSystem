// 添加角色按钮时弹出该界面
function admin_role_add(){
	layer.open({
	  type: 1,
	  title: '添加角色',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  shade: false,
	  maxmin: true, //开启最大化最小化按钮
	  area: ['700px', '500px'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_role'),
	  scrollbar: false
	  // content: [$('#add_role'), 'no'], //iframe的url，no代表不显示滚动条
	})

	 
	// layer.open({
	//       type: 2,
	//       title: '很多时候，我们想最大化看，比如像这个页面。',
	//       shadeClose: true,
	//       shade: false,
	//       maxmin: true, //开启最大化最小化按钮
	//       area: ['893px', '600px'],
	//       content: 'http://fly.layui.com/'
	//     }); 
	
	// $.ajax({
	// 		url: add_role_query_username_url,
	// 		type: 'post',
	// 		dataType: 'json',
	// 		data:{},
	// 		success:function(result){
	// 			$('#select').text("");//每一次点击都要把之前的数据清空，为赋值做准备
	// 			$.each(result,function (index,domEle){
	// 			//将用户的数据直接追加到边上
	// 			 $('#select').append("<option  value ="+this['uid']+">"+this['username']+"</option>");
	// 			});		
	// 		}
	//   	})
}


// 提交添加角色按钮时产生的js
function admin_role_add_submit(){
	var roleName = $('#roleName').val();     //角色名称
	var roleDescript = $('#roleDescript').val(); //角色描述
	if(roleName==""||roleDescript==""){
		layer.msg('角色名称或角色描述不能为空');
		return false;
	}
	var chk_value =[];//拿一个数组接收被选中的值
	$('input[name="user-Character-0-1-0"]:checked').each(function(){
	chk_value.push($(this).val()); //将值存放到数组中
	});

	if(chk_value.length==0){
		layer.msg('请给当前角色分配相应的权限');
		return false;
	}
	//将角色名称、角色描述和所选的规则权限提交到后台
		$.ajax({
	          url: role_add_submit_url, //管理员用户名检测地址
	          type: 'post',
	          dataType: 'json',
	          data:{roleName:roleName,roleDescript:roleDescript,chk_value:chk_value},
	          success:function(result){
	            if(result.success=="yes"){ //用户名存在时
	            	layer.msg('啊哈,角色添加成功');
					setTimeout(layer.closeAll(),"3000");
					// layer.closeAll();   //关闭所有添加层
					location.reload();	//让页面重新刷新
	            }else if(result.success=="no"){ //用户名不存在时
	              	layer.msg('对不起,该角色名或者已选权限规则已存在,请更改后再试');
					return false;
	             }
	          }
	      })
}

//角色删除
function admin_role_del(obj,rid){
	layer.confirm('确认要删除该角色吗', function(){
		layer.closeAll('dialog'); //关闭信息框
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


// 修改角色按钮时弹出该界面
function admin_role_edit(obj,rid){
	layer.open({
	  type: 1,
	  title: '修改权限规则',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#edit_role'),
	  end: function () {   //关闭重刷新
		location.reload();
	  }
	});
	// 根据aid异步发送数据到数据库请求数据
	$.ajax({
			url: edit_role_query_url,
			type: 'post',
			dataType: 'json',
			data:{rid:rid},
			success:function(result){
				if(result.success=="yes"){					
					$('#edit_roleId').val(result.rid);
					$('#edit_roleName').val(result.title);
					$('#edit_roleDescript').val(result.comment);

					$.each((result.rules),function(index,domEle){
						var $arr=	$("#edit_role :input[name='user-Character-0-1-1']");
						$arr.each(function(i,ele){  //抓取页面上所有的值
							var $ele=$(ele);
							if($(ele).val()==domEle) {
								$ele.attr("checked","checked");
								//alert('hello');
							};
							//domEle = "";
							//alert($(ele).val())
						});
					})

				}else if(result.success=="no"){
					layer.msg('系统崩溃出错啦');
					return false;
				}				
			}
	  	})
}


// 点击修改角色提交确定按钮将数据提交
function admin_role_edit_submit(obj,rid){
	var roleAid = $('#edit_roleId').val(); //角色id号
	var roleName = $('#edit_roleName').val(); //角色用户名
	var roleDescript = $('#edit_roleDescript').val(); //角色描述
	if(roleName==""||roleDescript==""){
		layer.msg('角色名称或角色描述不能为空');
		return false;
	}
	var chk_value =[];//拿一个数组接收被选中的值
	$('input[name="user-Character-0-1-1"]:checked').each(function(){
	chk_value.push($(this).val()); //将值存放到数组中
	});
	// alert(roleAid);
	// alert(chk_value);
	if(chk_value.length==0){
		layer.msg('请给当前角色分配相应的权限');
		return false;
	}
	//将编辑角色名称、角色描述和所选的规则权限提交到后台
		$.ajax({
	          url: role_edit_submit_url, //管理员用户名检测地址
	          type: 'post',
	          dataType: 'json',
	          data:{roleAid:roleAid,roleName:roleName,roleDescript:roleDescript,chk_value:chk_value},
	          success:function(result){
	            if(result.success=="yes"){ //用户名存在时
	            	layer.msg('啊哈,角色修改成功');
					setTimeout(layer.closeAll(),"3000");
					// layer.closeAll();   //关闭所有添加层
					location.reload();	//让页面重新刷新
	            }else if(result.success=="no"){ //用户名不存在时
	              	layer.msg('对不起,该角色名或者已选权限规则已存在,请更改后再试');
					return false;
	             }
	          }
	      })

}


//当点击标题中的全选按钮时,弹出的操作
$(function() {   
    $("#titleCheckbox").click(function() {  
        if ($(this).attr("checked")==undefined) {  //没有定义，说明没有被选中
        	$(this).attr("checked","checked")    //给当前对象选中状态
            $("input[name=checkbox]").each(function() {  //找到每一个名为checkbox的项，添加checked属性，值为checked
                $(this).prop("checked",true); 
                $(this).attr("checked","checked") 
            })
        }else if($(this).attr("checked")=="checked"){  
        	$(this).removeAttr("checked");
            $("input[name=checkbox]").each(function() {  
                $(this).removeAttr("checked");  
            }); 
        } 
    }); 


    //得到选中的值，ajax操作使用 
    $("#selectDel_submit").click(function() {  
    	var obj = $(this);
    	// alert($(obj).parents(".page-container").find(".tr_checkbox").html());
        var text="";  
        $("input[name=checkbox]").each(function() {  
            if ($(this).prop("checked")) {   //判断挑选选中的值,不选中的过滤掉
                text +=$(this).val()+",";  
            }  
        }); 
        // alert(text);
        if(text==""){
        	layer.msg("请选择要删除的选项");
        	return false;
        }
        layer.confirm('确认要删除所选的角色吗', function(){
        //ajax发送批量删除数据往后台处理
        $.ajax({
			url: del_multipleuser_url,
			type: 'post',
			dataType: 'json',
			data:{text:text},
			success:function(result){
				if(result.deleted=="yes"){	
					// $(obj).parent(".page-container").find("tr input[checked*=checked]").remove();
					layer.msg('已删除!',{icon:1,time:1000});
					location.reload();	//让页面重新刷新
				}else if(result.deleted=="no"){
					layer.msg('操作失败,请选择要删除的选项');
				}				
			}
	  	})
      });   
    });  
});


databases表格处
$(document).ready( function () {
    // $('#table_id').DataTable();
     $("#table_id").dataTable({
                //lengthMenu: [5, 10, 20, 30],//这里也可以设置分页，但是不能设置具体内容，只能是一维或二维数组的方式，所以推荐下面language里面的写法。
                paging: true,//分页
                ordering: true,//是否启用排序
                searching: true,//搜索
                // order: [[ 4, "desc" ]],
                language: {
                    lengthMenu: '<select class="form-control input-xsmall">' + '<option value="10">10</option>' + '<option value="20">20</option>' + '<option value="30">30</option>' + '<option value="40">40</option>' + '<option value="50">50</option>' + '</select>条记录',//左上角的分页大小显示。
                    search: '<span class="label label-success">搜索：</span>',//右上角的搜索文本，可以写html标签

                    paginate: {//分页的样式内容。
                        previous: "上一页",
                        next: "下一页",
                        first: "第一页",
                        last: "最后一页"
                    },
                    zeroRecords: "没有内容",//table tbody内容为空时，tbody的内容。
                    //下面三者构成了总体的左下角的内容。
                    info: "总共_PAGES_ 页，显示第_START_ 到第 _END_ ，筛选之后得到 _TOTAL_ 条，初始_MAX_ 条 ",//左下角的信息显示，大写的词为关键字。
                    infoEmpty: "0条记录",//筛选为空时左下角的显示。
                    infoFiltered: ""//筛选之后的左下角筛选提示，
                },
                paging: true,
                pagingType: "full_numbers",//分页样式的类型

            });
            $("#table_local_filter input[type=search]").css({ width: "auto" });//右上角的默认搜索文本框，不写这个就超出去了。
});