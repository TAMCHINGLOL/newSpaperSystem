$(document).ready(function() {
	// alert(get_consigneeList_url);
    // $('#table_id').dataTable( {
    //     "processing": true,
    //     "serverSide": true,
    //     "ajax": get_consigneeList_url,
    // } );

    var table = $("#table_id").DataTable({
    	"processing": true,
        "serverSide": true,
	    ajax: {
	        url: get_consigneeList_url,
	        type: "POST"
	    },
	    columns: [{
	        data: "name"
	    },
	    {
	        data: "age"
	    },
	    {
	        data: null
	    }],
	    columnDefs: [{
	        //   指定第最后一列
	        targets: 2,
	        render: function(data, type, row, meta) {
	            return '<a type="button"  href="#" onclick="show('+ row.id +')">删除</a>';
	        }
	    }]
	});

} );

//展示页面
function show(id){
	layer.open({
	  type: 1,
	  title: '添加管理员',
	  skin: 'layui-layer-demo', //样式类名
	  closeBtn: 1, //不显示关闭按钮
	  shift: 2,
	  area: ['100%', '100%'],
	  shadeClose: true, //开启遮罩关闭
	  content: $('#showConsigneeList')
	});
    // $.ajax({
    //     url: ,
    //     //在后台接受id这个参数
    //     data: {
    //         id: id
    //     },
    //     success: function(data) {
    //         if (data.flag) {
    //             //如果后台删除成功，则刷新表格，并提示用户删除成功
    //             //保留分页信息
    //             table.ajax.reload(null, false);
    //             alert(name + data.msg);
    //         }
    //     }
    // })
}

