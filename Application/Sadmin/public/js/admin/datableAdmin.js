/**
 * Created by dustine on 2016/8/16.
 */
//databases表格处
$(document).ready(function () {
	$("#table_id").dataTable({
		paging: true,//分页
		ordering: false,//是否启用排序
		searching: false,//搜索
		bAutoWidth: true, //是否自适应宽度
		"aLengthMenu": [
			[10, 20, 30],
			[10, 20, 30]
		],
		"dom": 'rt<"bottom"iflp<"clear">>',
		language: {
			"sProcessing": "玩命加载中...",
			"sLengthMenu": "显示 _MENU_ 项结果",
			"sZeroRecords": "没有匹配结果",
			"sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
			"sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
			"sInfoFiltered": "(由 _MAX_ 项结果过滤)",
			"sInfoPostFix": "",
			"sSearch": "搜索:",
			"sUrl": "",
			"sEmptyTable": "赶 紧 上 车",
			"sLoadingRecords": "载入中...",
			"sInfoThousands": ",",
			"oPaginate": {
				"sFirst": "首页",
				"sPrevious": "上页",
				"sNext": "下页",
				"sLast": "末页"
			},
			"oAria": {
				"sSortAscending": ": 以升序排列此列",
				"sSortDescending": ": 以降序排列此列"
			}
		},
		"aaSorting": [
			[1, "desc"]
		],

	});
});