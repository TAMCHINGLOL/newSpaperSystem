$(document).ready(function () {
    // alert(get_projectList_url);
    // console.log(get_projectList_url); 
    $('#table_id').dataTable({
        "processing": true,
        "serverSide": true,
        searching: false,//搜索
        "ajax": get_projectList_url,
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

    });

});

//展示页面
function project_edit(obj, uid) {
    //alert(uid);
    layer.open({
        type: 1,
        title: '添加项目管理',
        skin: 'layui-layer-demo', //样式类名
        closeBtn: 1, //不显示关闭按钮
        shift: 2,
        area: ['100%', '100%'],
        shadeClose: true, //开启遮罩关闭
        content: $('#edit_project')
    });



    // 根据aid异步发送数据到数据库请求数据
    $.ajax({
        url: edit_project_query_url,
        type: 'post',
        dataType: 'json',
        data:{uid:uid},
        success:function(result){
            if(result.success=="yes"){
                $('#edit_roleId').val(result.rid);
                $('#edit_roleName').val(result.title);
                $.each((result.rules),function(index,domEle){
                    var $arr=$("#edit_role :input[name='user-Character-0-1-1']");
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

//页面删除
function project_del(obj, uid) {
    //alert(uid);

    layer.confirm('确认要删除项目', function(){
        layer.closeAll('dialog'); //关闭信息框
        $.ajax({
            url: del_project,
            type: 'post',
            dataType: 'json',
            data:{'uid':uid},
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

function add_project() {
    layer.open({
        type: 1,
        title: '添加项目管理',
        skin: 'layui-layer-demo', //样式类名
        closeBtn: 1, //不显示关闭按钮
        shift: 2,
        area: ['100%', '100%'],
        shadeClose: true, //开启遮罩关闭
        content: $('#add_project')
    });
}

