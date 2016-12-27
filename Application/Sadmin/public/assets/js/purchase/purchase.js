
//弹出添加采购需求窗口
function purchase_add(){
  layer.open({
    type: 1,
    title: '添加采购需求',
    skin: 'layui-layer-demo', //样式类名
    closeBtn: 1, //不显示关闭按钮
    shift: 2,
    shade: false,
    maxmin: true, //开启最大化最小化按钮
    area: ['100%', '100%'],
    shadeClose: true, //开启遮罩关闭
    content: $('#add_purchase'),
    scrollbar: false
  })
}

// 提交添加采购需求
function purchase_add_submit(){
  //alert('aaaaa');
  var purchaseTitle = $('#purchaseTitle'
    ).val();
  var purchaseContent = $('#purchaseContent').val();
  var sellerID = $('#sellerID').val();
  var proID = $('#proID').val();
  var expire = $('#expire').val();

  if(purchaseTitle==""||purchaseContent==""||expire==""||proID==""){
    layer.msg('添加的采购需求不为空');
    return false;
  }

  $.ajax({
          url: purchase_add_submit_url, //添加采购需求检测地址
          type: 'post',
          dataType: 'json',
          data:{purchaseTitle:purchaseTitle,purchaseContent:purchaseContent,sellerID:sellerID,proID:proID,expire:expire},
          success:function(result){
          // alert(result.success);
            //var result='';
            //  alert(result.success);
            //eval('result='+myresult+';');
            if(result.success=="yes"){
              alert('采购需求添加成功！');
              setTimeout(layer.closeAll(),"1000");
              location.reload();  //让页面重新刷新
            }else if(result.success=="no"){
                layer.msg('采购需求添加失败！');
        return false;
             }
          }
      });
}

//选择修改采购需求
function purchase_seledit(obj,purchaseRequirementId){
  layer.open({
    type: 1,
    title: '修改采购需求',
    skin: 'layui-layer-demo', //样式类名
    closeBtn: 1, //不显示关闭按钮
    shift: 2,
    area: ['100%', '100%'],
    shadeClose: true, //开启遮罩关闭
    content: $('#edit_purchase'),
    scrollbar: false
  });
  // alert(purchaseRequirementId);
  //return false;
  $.ajax({
      url: purchase_info_url,
      type: 'post',
      dataType: 'json',
      data:{'purchaseRequirementId':purchaseRequirementId},
      success:function(result){
        // alert(result.success);
        if(result.success=="yes"){
          // alert(result.buyerId);
          $('#buyerIDEdit').val(result.buyerId);
          $('#purchaseRequirementIdEdit').val(result.purchaseRequirementId);
          $('#purchaseTitleEdit').val(result.purchaseTitle);
          $('#purchaseContentEdit').val(result.purchaseContent);
          $('#expireEdit').val(result.expire1);
        }else if(result.success=="no"){
          layer.msg('系统崩溃出错啦');
          return false;
        }
      }
      })
}


// 点击修改采购需求提交确定按钮，将数据提交
function purchase_edit_submit(){
  //alert('aa');

  var purchaseTitle = $('#purchaseTitleEdit').val();
  var purchaseContent = $('#purchaseContentEdit').val();
  var purchaseRequirementId = $('#purchaseRequirementIdEdit').val();
  var expire = $('#expireEdit').val();
  // if(purchaseTitle==""||purchaseContent==""||buyerID==""||proID==""||expire==""){
  //  layer.msg('采购需求未修改');
  //  return false;
  // }
  //将修改采购需求参数提交到后台
  $.ajax({
          url: purchase_edit_submit_url,
          type: 'post',
          dataType: 'json',
          data:{purchaseTitle:purchaseTitle,purchaseContent:purchaseContent,purchaseRequirementId:purchaseRequirementId,expire:expire},
          success:function(result){
            if(result.success=="yes"){ //用户名存在时
              //alert('aa');
              alert('采购需求修改成功');
              setTimeout(layer.closeAll(),"1000");
              location.reload();  //让页面重新刷新
            }else if(result.success=="no"){ //用户名不存在时
        //alert('cc');
                layer.msg('您没有做任何的信息修改,请重新编辑！');
        return false;
             }
          }
      })
}


//弹出添加选定卖家发送采购需求窗口
function purchase_send(obj,purchaseRequirementId){
  layer.open({
    type: 1,
    title: '选定卖家发送采购需求',
    skin: 'layui-layer-demo', //样式类名
    closeBtn: 1, //不显示关闭按钮
    shift: 2,
    area: ['100%', '100%'],
    shadeClose: true, //开启遮罩关闭
    content: $('#purchase_send'),
    scrollbar: false
  });
  // alert(purchaseRequirementId);
  // return false;
  $.ajax({
      url: purchase_info_url,
      type: 'post',
      dataType: 'json',
      data:{'purchaseRequirementId':purchaseRequirementId},
      success:function(result){
        if(result.success=="yes"){
          $('#purchaseRequirementIdSend').val(result.purchaseRequirementId);
          $('#sellersIDSend').val(result.sellersIDSend);
        }else if(result.success=="no"){
          layer.msg('系统崩溃出错啦');
          return false;
        }
      }
      })
}


// 点击选定卖家发送采购需求提交确定按钮，将数据提交
function purchase_send_submit(){
  //alert('aa');

  var purchaseRequirementIdSend = $('#purchaseRequirementIdSend').val();
  
  var chk_value =[];//拿一个数组接收被选中的值
  $('input[name="sellersIDSend"]:checked').each(function(){
  chk_value.push($(this).val()); //将值存放到数组中
  });
  if(chk_value.length==0){
    layer.msg('请选择卖家ID');
    return false;
  }
  // alert(chk_value);

  //买家选定卖家发送采购需求
  $.ajax({
          url: purchase_send_submit_url,
          type: 'post',
          dataType: 'json',
          data:{purchaseRequirementIdSend:purchaseRequirementIdSend,chk_value:chk_value},
          success:function(result){
            if(result.success=="yes"){ //用户名存在时
              //alert('aa');              
              alert('采购需求发送成功');
              // return;    
              setTimeout(layer.closeAll(),"1000");
              location.reload();  //让页面重新刷新
            }else if(result.success=="no"){ //用户名不存在时
        //alert('cc');
                layer.msg('采购需求发送失败');
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