//弹出添加分类项窗口
function type_add(){
	layer.open({
	  type: 1,
	  title: '添加分类项',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  shade: false,
	  maxmin: true, //开启最大化最小化按钮
	  area: ['720px', '500px'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_type'),
	  scrollbar: false
	})
}

// 提交添加分类项内容
function type_add_submit(){
	var typeName = $('#typeName').val();
	var typeSort = $('#typeSort').val();

	if(typeName==""||typeSort==""){
		layer.msg('分类参数不能为空');
		return false;
	}
	$.ajax({
          url: type_add_submit_url, //管理员添加分类项检测地址
          type: 'post',
          dataType: 'json',
          data:{typeName:typeName,typeSort:typeSort},
          success:function(result){
            if(result.success=="yes"){ 
            	layer.msg('分类添加成功！');
				setTimeout(layer.closeAll(),"1000");
				location.reload();	//让页面重新刷新
            }else if(result.success=="no"){ 
              	layer.msg('该分类参数已存在,请重新编辑！');
				return false;
             }
          }
      })
}

//删除分类项
function type_del(obj,uid){
	layer.confirm('确认要删除该分类项吗', function(){
		layer.closeAll('dialog'); //关闭信息框
	      $.ajax({
			url: type_del_url,
			type: 'post',
			dataType: 'json',
			data:{'uid':uid},
			success:function(result){
				if(result.deleted=="yes"){				
					$(obj).parents("tr").remove();
					layer.msg('分类项已删除!',{icon:1,time:1000});
				}else if(result.deleted=="no"){
					layer.msg('该操作失败！');
				}				
			}
	  	})
	});
}

//选择修改分类项
function type_seledit(obj,uid){
	layer.open({
	  type: 1,
	  title: '修改分类项',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['720px', '500px'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#edit_type'),
	  scrollbar: false
	});
	$.ajax({
			url: type_sel_url,
			type: 'post',
			dataType: 'json',
			data:{'uid':uid},
			success:function(result){
				if(result.success=="yes"){	
					$('#edit_typeId').val(result.uid);	//分类id，方便修改分类项时获取id值		
					$('#edit_typeName').val(result.typeName);
					$('#edit_typeSort').val(result.typeSort)
				}else if(result.success=="no"){
					layer.msg('系统崩溃出错啦');
					return false;
				}				
			}
	  	})
}

//修改分类项
function type_edit_submit(obj,eid){
	var edit_typeEid = $('#edit_typeId').val(); 
	var edit_typeName = $('#edit_typeName').val();
	var edit_typeSort = $('#edit_typeSort').val();
	if(edit_typeName==""){
		layer.msg('问题参数均不能为空');
		return false;
	}
	//将修改分类项参数提交到后台
	$.ajax({
          url: type_edit_submit_url, //管理员用户名检测地址
          type: 'post',
          dataType: 'json',
          data:{eid:edit_typeEid,typeName:edit_typeName,typeeSort:edit_typeSort},
          success:function(result){
            if(result.success=="yes"){ //用户名存在时
            	layer.msg('问题项修改成功');
				setTimeout(layer.closeAll(),"1000");
				location.reload();	//让页面重新刷新
            }else if(result.success=="no"){ //用户名不存在时
              	layer.msg('该问题参数已存在,请重新编辑！');
				return false;
             }
          }
      })
}


//弹出添加问题窗口
function que_add(){
	layer.open({
	  type: 1,
	  title: '添加问题项',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  shade: false,
	  maxmin: true, //开启最大化最小化按钮
	  area: ['720px', '500px'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_que'),
	  scrollbar: false
	})
}

// 提交添加问题项内容
function que_add_submit(){
	var queTitle = $('#queTitle').val();
	var queTypeId = $("#queType").find("option:selected").val();
	var queDesc = $('#queDesc').val(); 
	var queDetail = $('#queDetail').val();
	var queSort = $('#queSort').val();

	if(queTitle==""||queDesc==""||queDetail==""||queSort==""){
		layer.msg('问题参数均不能为空');
		return false;
	}
	$.ajax({
          url: que_add_submit_url, //管理员添加问题项检测地址
          type: 'post',
          dataType: 'json',
          data:{queTitle:queTitle,queTypeId:queTypeId,queDesc:queDesc,queDetail:queDetail,queSort:queSort},
          success:function(result){
            if(result.success=="yes"){ 
            	layer.msg('问题添加成功！');
				setTimeout(layer.closeAll(),"1000");
				location.reload();	//让页面重新刷新
            }else if(result.success=="no"){ 
              	layer.msg('该问题参数已存在,请重新编辑！');
				return false;
             }
          }
      })
}

// /删除问题项
function que_del(obj,uid){
	layer.confirm('确认要删除该问题项吗', function(){
		layer.closeAll('dialog'); //关闭信息框
	      $.ajax({
			url: que_del_url,
			type: 'post',
			dataType: 'json',
			data:{'uid':uid},
			success:function(result){
				if(result.deleted=="yes"){				
					$(obj).parents("tr").remove();
					layer.msg('问题项已删除!',{icon:1,time:1000});
				}else if(result.deleted=="no"){
					layer.msg('该操作失败！');
				}				
			}
	  	})
	});
}

//选择修改问题项
function que_seledit(obj,uid){
	layer.open({
	  type: 1,
	  title: '修改问题项',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['720px', '500px'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#edit_que'),
	  scrollbar: false
	});
	$.ajax({
			url: que_seledit_url,
			type: 'post',
			dataType: 'json',
			data:{'uid':uid},
			success:function(result){
				if(result.success=="yes"){	
					$('#edit_queId').val(result.uid);	//问题id，方便修改问题项时获取id值		
					$('#edit_queTitle').val(result.queTitle);
					$("#edit_queType").val(result.queTypeId);
					$('#edit_queDesc').val(result.queDesc);
					$('#edit_queDetail').val(result.queDetail);
					$('#edit_queSort').val(result.queSort);
				}else if(result.success=="no"){
					layer.msg('系统崩溃出错啦');
					return false;
				}				
			}
	  	})
}

// 点击修改问题项提交确定按钮，将数据提交
function que_edit_submit(obj,eid){

	var edit_Eid = $('#edit_queId').val(); 
	var edit_queTitle = $('#edit_queTitle').val();
	var edit_queTypeId = $("#edit_queType").find("option:selected").val();  //获取修改后的类型值
	var edit_queDesc = $('#edit_queDesc').val(); 
	var edit_queDetail = $('#edit_queDetail').val();
	var edit_queSort = $('#edit_queSort').val();

	if(edit_queTitle==""||edit_queDesc==""||edit_queDetail==""||queSort==""){
		layer.msg('问题参数均不能为空');
		return false;
	}
	//将修改问题项参数提交到后台
	$.ajax({
          url: que_edit_submit_url, //管理员用户名检测地址
          type: 'post',
          dataType: 'json',
          data:{eid:edit_Eid,queTitle:edit_queTitle,queTypeId:edit_queTypeId,queDesc:edit_queDesc,queDetail:edit_queDetail,queSort:edit_queSort},
          success:function(result){
            if(result.success=="yes"){ //用户名存在时
            	layer.msg('问题项修改成功');
				setTimeout(layer.closeAll(),"1000");
				location.reload();	//让页面重新刷新
            }else if(result.success=="no"){ //用户名不存在时
              	layer.msg('该问题参数已存在,请重新编辑！');
				return false;
             }
          }
      })
}

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

            paginate: {//分页的样式内容
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