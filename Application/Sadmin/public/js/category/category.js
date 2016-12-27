//类别发布/编辑弹出窗口
function category_add_edit(cid) {
    var categoryAddEdit_url = Category_url;
    if (cid) {
        categoryAddEdit_url += '/template_id/' + cid;
    }
    parent.layer.open({
        type: 2,
        title: '添加/编辑类别管理',
        shadeClose: true,
        shade: true,
        scrollbar: false,
        maxmin: true, //开启最大化最小化按钮
        area: ['90%', '90%'],
        content: categoryAddEdit_url,
        end: function() {}
    });
}

//提交按钮
$("#submit_button").click(function() {
    var categoryId = $('.categoryId').val();
    var showCode = $('.showCode').val();
    var categoryName = $('.categoryName').val();
    var keyWord = $('.keyWord').val();
    var sortNumber = $('.sortNumber').val();
    var checkText = $(".category-id").find("option:selected").val(); //获取Select选择的Text(上级目录Id)
    // alert(checkText);
    // return false;
    if (isNaN(sortNumber)) {
        layer.alert("排序号必须是数字");
        return false;
    }
    if (sortNumber == "") {
        layer.alert("排序号不能为空");
        return false;
    }
    if(parseInt(sortNumber) != sortNumber){
     layer.alert("排序号不能为小数");
     return false;
    }
    if (checkText == "") {
        layer.alert("上级目录不能为空");
        return false;
    }
    //ajax发数据前往后台处理
    $.ajax({
        url: category_add_edit_url, //分类控制器接收数据地址
        type: 'post',
        dataType: 'json',
        data: { categoryId: categoryId, showCode: showCode, categoryName: categoryName, keyWord: keyWord, sortNumber: sortNumber, checkText: checkText },
        success: function(result) {
            parent.ifm.contentWindow.location.reload(true); //关闭前刷新
            if(result.status==1){
              layer.msg(result.info);
              setTimeout("parent.layer.closeAll()", 2000)
            }else if(result.status==0){
              layer.msg("操作失败,"+result.info);
              return false;
            }  
        }
    })
});

//取消按钮
function category_cancer() {
    //当你在iframe页面关闭自身时
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    parent.layer.close(index); //再执行关闭
}


//类别删除按钮
function category_del(obj, cid) {
    layer.confirm('确认要删除吗', function() {
        var categoryId = cid;
        //ajax发数据前往后台处理
        $.ajax({
            url: category_del_url, //分类删除按钮
            type: 'post',
            dataType: 'json',
            data: { categoryId: categoryId },
            success: function(result) {
                // console.log(result.status);
                // return false;
                if (result.status == 1) { //用户名存在时
                    layer.alert(result.info);
                    location.reload(); //让页面重新刷新
                }else if(result.status == 0){
                    layer.alert(result.info);
                }
            }
        })
    });

}
