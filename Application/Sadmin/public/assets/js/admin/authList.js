/*
 *权限的js控制器
 */

//点击添加权限按钮信息弹出框
function addAuth(){
	layer.open({
	  type: 1,
	  title: '添加权限',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_auth')
	});
}

//异步ajax发送添加权限数据后台处理
function addAuth_submit(){
	var authname = $('#authName').val(); //权限名称
	var auth_model_name = $('#auth_model_name').val(); //权限字段名
	// 不允许表单中的内容为空时提示一下用户
	if(authname==""||auth_model_name==""){
		layer.msg('信息填写不完整,添加失败');
		return false;
	}
	//异步发送权限名称和字段名称数据到后台处理
	$.ajax({
			url: add_auth_url,
			type: 'post',
			dataType: 'json',
			data:{authname:authname,auth_model_name:auth_model_name},
			success:function(result){
				if(result.addauth=="yes"){
					layer.msg('啊哈,恭喜添加成功');
					setTimeout(layer.closeAll(),"3000");
					location.reload();	//让页面重新刷新
				}else if(result.addauth=="no"){
					layer.msg('操作失败,权限规则已存在');
					return false;
				}				
			}
	  	})
}

//删除权限规则
function authRuleDel(obj,rid){
	var rid = rid;  //获得相对应的权限规则id
	layer.confirm('确认要删除该权限规则吗', function(){
	$.ajax({
			url: del_auth_url,
			type: 'post',
			dataType: 'json',
			data:{rid:rid},
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

//点击编辑权限按钮信息弹出框
function auth_rule_edit(obj,rid){
	layer.open({
	  type: 1,
	  title: '修改权限规则',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#edit_auth')
	});
	// 根据aid异步发送数据到数据库请求数据
	$.ajax({
			url: edit_auth_rule_query_url,
			type: 'post',
			dataType: 'json',
			data:{rid:rid},
			success:function(result){
				if(result.success=="yes"){					
					$('#edit_authId').val(result.rid);
					$('#edit_authName').val(result.title);
					$('#edit_auth_model_name').val(result.name);
				}else if(result.success=="no"){
					layer.msg('系统崩溃出错啦');
					return false;
				}				
			}
	  	})
}

// 点击编辑信息提交
function edit_Auth_rule_submit(){
	var authId = $('#edit_authId').val(); //权限规则id
	var authName = $('#edit_authName').val(); //权限名称
	var auth_model_name = $('#edit_auth_model_name').val(); //权限字段名
	// 不允许表单中的内容为空时提示一下用户
	if(authName==""||auth_model_name==""){
		//提示层
		layer.msg('信息填写不完整,修改失败');
		return false;
	}
	//当修改完成后异步发送数据到后台处理
	$.ajax({
			url: edit_Auth_rule_url,
			type: 'post',
			dataType: 'json',
			data:{authId:authId,authName:authName,auth_model_name:auth_model_name},
			success:function(result){
				if(result.success=="yes"){
					layer.msg('啊哈,恭喜修改成功');
					setTimeout(layer.closeAll(),"3000");
					// layer.closeAll();   //关闭所有添加层
					location.reload();	//让页面重新刷新

				}else if(result.success=="no"){
					layer.msg('操作失败');
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
        layer.confirm('确认要删除所选的权限吗', function(){
        //ajax发送批量删除数据往后台处理
        $.ajax({
			url: del_multipleuser_url,
			type: 'post',
			dataType: 'json',
			data:{text:text},
			success:function(result){
				if(result.deleted=="yes"){	
					// $(obj).parent(".page-container").find("tr input[checked*=checked]").remove();
					layer.msg('已删除，由于部分权限不足，不能全部删除!',{icon:1,time:1000});
					location.reload();	//让页面重新刷新
				}else if(result.deleted=="no"){
					layer.msg('操作失败,由于部分权限不足，不能全部删除');
				}				
			}
	  	})
     });    
    });  
});



//databases表格处
$(document).ready( function () {
    // $('#table_id').DataTable();
     $("#table_id").dataTable({
                //lengthMenu: [5, 10, 20, 30],//这里也可以设置分页，但是不能设置具体内容，只能是一维或二维数组的方式，所以推荐下面language里面的写法。
                paging: true,//分页
                ordering: true,//是否启用排序
                searching: true,//搜索
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