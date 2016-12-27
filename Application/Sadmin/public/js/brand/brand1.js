/*
 *品牌列表的一系列js操作
 */

//品牌删除
function brand_del(obj,brandUid){
	layer.confirm('确认要删除该品牌吗', function(){
		layer.closeAll('dialog'); //关闭信息框
	      $.ajax({
			url: del_brand_url,
			type: 'post',
			dataType: 'json',
			data:{'brandUid':brandUid},
			success:function(result){
				if(result.deleted=="yes"){				
					layer.msg('删除成功');
					setTimeout(layer.closeAll(),"3000");
					// layer.closeAll();   //关闭所有添加层
					location.reload();	//让页面重新刷新
				}else if(result.deleted=="no"){
					layer.msg('操作失败');
				}				
				}
	  	})
	});
}

//品牌添加信息弹出框
function admin_add(){
	layer.open({
	  type: 1,
	  title: '添加品牌',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#add_brand')
	});
}

//异步ajax发送添加品牌数据后台处理
function addBrand_submit(){
	var brandName = $('#brandName').val(); //品牌名
	var brandSort = $('#brandSort').val(); //品牌排序
	if(brandName==""||brandSort==""){
		//提示层
		layer.msg('信息填写不完整,添加失败');
		return false;
	}
	//如果不是一个数字的话
    if(isNaN(brandSort)){
    	//提示层
		layer.msg('排序应是数值类型');
		return false;
    }
	//当验证完成后异步发送数据到后台处理
	$.ajax({
			url: add_brand_url,
			type: 'post',
			dataType: 'json',
			data:{brandName:brandName,brandSort:brandSort},
			success:function(result){
				if(result.added=="yes"){
					layer.msg('啊哈,恭喜添加成功');
					setTimeout(layer.closeAll(),"3000");
					// layer.closeAll();   //关闭所有添加层
					location.reload();	//让页面重新刷新

				}else if(result.addadmin=="no"){
					layer.msg('操作失败,品牌已存在');
					return false;
				}				
			}
	  	})
}


//品牌修改信息弹出框
function brand_edit(obj,uid){
	layer.open({
	  type: 1,
	  title: '修改品牌信息',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#edit_brand')
	});
	// 根据aid异步发送数据到数据库请求数据
	$.ajax({
			url: edit_brand_query_url,
			type: 'post',
			dataType: 'json',
			data:{uid:uid},
			success:function(result){
				if(result.success=="yes"){
					$('#edit_brandUid').val(result.brandUid);
					$('#edit_brandName').val(result.brandName);
					$('#edit_brandSort').val(result.brandSort);
				}else if(result.success=="no"){
					// layer.msg('系统崩溃出错啦');
					return false;
				}				
			}
	  	})

}

//异步ajax发送修改品牌数据后台处理
function editBrand_submit(){
	var brandUid = $('#edit_brandUid').val(); //品牌id
	var brandName = $('#edit_brandName').val(); //品牌名
	var brandSort = $('#edit_brandSort').val(); //品牌排序
	if(brandName==""||brandSort==""){
		//提示层
		layer.msg('信息填写不完整,添加失败');
		return false;
	}
	//如果不是一个数字的话
    if(isNaN(brandSort)){
    	//提示层
		layer.msg('排序应是数值类型');
		return false;
    }

	//当修改完成后异步发送数据到后台处理
	$.ajax({
			url: edit_brand_url,
			type: 'post',
			dataType: 'json',
			data:{brandUid:brandUid,brandName:brandName,brandSort:brandSort},
			success:function(result){
				if(result.updated=="yes"){
					layer.msg('啊哈,恭喜修改成功');
					setTimeout(layer.closeAll(),"3000");
					// layer.closeAll();   //关闭所有添加层
					location.reload();	//让页面重新刷新

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
        if(text==""){
        	layer.msg("请选择要删除的选项");
        	return false;
        }
        layer.confirm('确认要删除所选的管理员吗', function(){
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

