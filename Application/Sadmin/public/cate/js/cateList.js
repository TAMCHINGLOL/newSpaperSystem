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
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_type'),
	  scrollbar: false
	})
}

//弹出添加问题窗口
function cate_add(){
	layer.open({
	  type: 1,
	  title: '添加分类信息',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  shade: false,
	  maxmin: true, //开启最大化最小化按钮
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_que'),
	  scrollbar: false
	})
}

// 提交添加问题项内容
function cate_add_submit(){
	//alert('aaaaa');
	var categoryTitle = $('#categoryTitle').val();
	var categoryMessage = $('#categoryMessage').val();
	var categoryActionId = $("input[type='radio']:checked").val();
	var catetoryJumpMessage = $('#catetoryJumpMessage').val();
	var categroyFather=$('#categroyFather').val();

	//alert(categroyFather);
	//return false;
	if(categoryTitle==""||categoryMessage==""||catetoryJumpMessage==""||categroyFather==""
	){
		layer.msg('添加的分类信息不为空');
		return false;
	}

	$.ajax({
          url: cate_add_submit_url, //管理员添加问题项检测地址
          type: 'post',
          dataType: 'json',
          data:{categoryTitle:categoryTitle,categoryMessage:categoryMessage,categoryActionId:categoryActionId,catetoryJumpMessage:catetoryJumpMessage,categroyFather:categroyFather},
          success:function(result){
			 ////var result='';
			 //  alert(result.success);
			 // //eval('result='+myresult+';');
            if(result.success=="yes"){
            	layer.msg('分类信息添加成功！');
				setTimeout(layer.closeAll(),"1000");
				location.reload();	//让页面重新刷新
            }else if(result.success=="no"){
              	layer.msg('该问题参数已存在,请重新编辑！');
				return false;
             }
          }
      });
}

// /删除问题项
function cate_del(obj,uid){
	//alert(uid);
	//return false;
	layer.confirm('确认要删除该问题项吗', function(){
		layer.closeAll('dialog'); //关闭信息框
	      $.ajax({
			url: cate_del_url,
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
function cate_seledit(obj,uid){
	layer.open({
	  type: 1,
	  title: '修改问题项',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#edit_que'),
	  scrollbar: false
	});
	//alert(uid);
	//return false;
	$.ajax({
			url: cate_seledit_url,
			type: 'post',
			dataType: 'json',
			data:{'uid':uid},
			success:function(result){
				if(result.success=="yes"){
					//alert(result.uid);
					$('#cat_uid').val(result.uid);	//问题id，方便修改问题项时获取id值
					$('#categoryTitle1').val(result.cat_name);
					$("input[type='radio']").each(function(){
						if($(this).val()==result.action_type)
							$(this).prop('checked','true');
					});
					$('#categoryMessage1').val(result.cat_desc);
					$('#catetoryJumpMessage1').val(result.action_content);
				}else if(result.success=="no"){
					layer.msg('系统崩溃出错啦');
					return false;
				}
			}
	  	})
}






// 点击修改问题项提交确定按钮，将数据提交
function cate_edit_submit(){
//alert('aa');

	var cat_uid = $('#cat_uid').val();
	var categoryTitle1 = $('#categoryTitle1').val();
	var categoryMessage1=$('#categoryMessage1').val();
	var categroyFather1=$('#categroyFather1').val();
	var cateAction_type = $("input[name='form-field-radio']:checked").val();  //获取修改后的类型值
	var catetoryJumpMessage1 = $('#catetoryJumpMessage1').val();


	//if(edit_queTitle==""||edit_queDesc==""||edit_queDetail==""||edit_queTypeId==undefined){
	//	layer.msg('问题参数均不能为空');
	//	return false;
	//}
	//将修改问题项参数提交到后台
	$.ajax({
          url: cate_edit_submit_url,
          type: 'post',
          dataType: 'json',
          data:{uid:cat_uid,cat_name:categoryTitle1,cat_desc:categoryMessage1,parent_uid:categroyFather1,action_type:cateAction_type,action_content:catetoryJumpMessage1},
          success:function(result){
            if(result.success=="yes"){ //用户名存在时
            	//alert('aa');
				layer.msg('分类项修改成功');
				setTimeout(layer.closeAll(),"1000");
				location.reload();	//让页面重新刷新
            }else if(result.success=="no"){ //用户名不存在时
				//alert('cc');
              	layer.msg('您没有做任何的分类信息修改,请重新编辑！');
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