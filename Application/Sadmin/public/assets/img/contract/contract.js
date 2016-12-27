/**
 * Created by TAM_CHING_LOL on 2016/8/5.
 */

//下拉选择事件
function selectVal() {
    var options = $("#form-field-select-3 option:selected").text();  //获取选中项的值
    var contractHeader = document.getElementById("contractHeader");
    contractHeader.innerHTML = options;
    var adminId = "12";            //合同模板Id
    //选择对应模板名的模板合同
    $.ajax({
        url: find_contract_book_url,
        type: 'post',
        dataType: 'json',
        data: {adminId: adminId},
        success: function(result){
//                document.getElementById("myEditor").innerHTML = "";
            document.getElementById("myEditor").innerHTML = result.name + result.age;
        },
        error: function(){
            layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;加 载 失 败 ');
        }
    });
    if(options != "默认模板"){
        $("#nextBtn").css("display","none");
        $("#otherOpr").css("display","block");
    }else{
        $("#nextBtn").css("display","block");
        $("#otherOpr").css("display","none");
    }
}

//页面加载完毕
$(document).ready(function() {
    //选择模板类型弹出层
    var bookType = layer.open({
        closeBtn: 0,
        type: 1,
        skin: "layui-layer-molv",
        title: '选 择 合 同 模 板 类 型',
        shade: 0.6,         //遮罩透明度
        moveType: 1,        //1为可拖拽
        shift: 1,
        scrollbar: false,
        area: ['400px', '280px'],
        content: $('#selectBookType')
    });

    //实例化UMeditor
    var um = UM.getEditor('myEditor');

    //实例化chosen
    jQuery(function ($) {
//      如果select中的选项发生变化，例如通过ajax更新了option可以在ajax的回调函数中更新chosen
        jQuery("#form-field-select-3").trigger("liszt:updated");
        $("#form-field-select-3").chosen({
            no_results_text: "没有找到结果:",
            allow_single_deselect: true
        });
    });
    jQuery(function ($) {
        jQuery("#form-field-select-4").trigger("liszt:updated");
        $("#form-field-select-4").chosen({
            no_results_text: "没有找到结果:",
            allow_single_deselect: true
        });
    });

    //创建新类型按钮事件
    $("#addNewType").click(function(){
        var status = document.getElementById("addNewTypeDiv");
        if(status.style.display == "none") {
            $("#addNewTypeDiv").css('display', 'block');
        }else{
            $("#addNewTypeDiv").css('display', 'none');
        }
    });

    //创建按钮事件
    $("#addNewTypeBtn").submit(function(){
        $.ajax({
            url: "添加模板类型URL",
            type: "post",
            dataType: "json",
            data: {},
            success: function(result){
                location.reload();
            }
        })
    });

    //选择类型按钮确定事件
    $("#selectType").click(function(){
        //layer.close(bookType);
        //$.ajax({
        //    url: "查询对应类型的模板列表URL",
        //    type: "post",
        //    dataType: "json",
        //    data: {},
        //    success: function(result){
                layer.close(bookType);                  //关闭层
                //获取下拉菜单的子选项个数:用于首次使用提示
                var optionsLength = document.getElementById("form-field-select-3").length;
                if(optionsLength <= 1){
                    layer.open({
                        type: 1,
                        skin: "layui-layer-lan",
                        title: '<label>温 馨 提 示 : <small style="color: red"> 需 填 写 部 分 必 须 留 白</small></label>',
                        shade: 0.6,  //遮罩透明度
                        moveType: 1, //1为可拖拽
                        shift: 3,
                        time: 8000,
                        area: ['900px', '490px'],
                        content: image
                    });
                }
        //    }
        //});
    });

    //帮助按钮事件
    $("#contractHelp").click(function(){
        layer.open({
            type: 1,
            skin: "layui-layer-lan",
            title: '<label>温 馨 提 示 : <small style="color: red"> 需 填 写 部 分 必 须 留 白</small></label>',
            shade: 0.6,             //遮罩透明度
            moveType: 1,            //1为可拖拽
            shift: 4,
            time: 8000,
            area: ['900px', '490px'],
            content: image
        });
    });

    //下一步按钮事件
    $("#nextBtn").click(function(){
        var contractContent = $("#myEditor").text();
        contractContent = contractContent.replace( /^\s*/, '');         //去除左空格
        if(contractContent.length > 0){
            var bookContent = um.getContent();                          //获得编辑器的内容
            $.ajax({
                url: add_contract_book_url,
                type: 'post',
                dataType: 'json',
                data: {bookContent:bookContent},
                success: function(result){
                    if(result.status == 'yes'){
                        var addContractNameLayer1 = layer.open({
                            type: 1,
                            skin: "layui-layer-lan",
                            title: '保 存 模 板 名 称',
                            shade: 0.6,         //遮罩透明度
                            moveType: 1,        //1为可拖拽
                            shift: 4,
                            area: ['400px', '160px'],
                            content: $('#addContractName')
                        });
                    }
                }
            });
        }else{
            layer.alert(" 请 添 加 合 同 内 容",{
                icon: 6,
                time: 3000
            });
        }
    });

    //保存按钮事件
    $("#addContractNameBtn").click(function(){
        layer.closeAll();
        layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;保 存 失 败 ');
        $.ajax({
            url: "添加模板合同URL",
            type: "post",
            dataType: "json",
            data: {},
            success: function(result){
                layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;保 存 失 败 ');
            }
        })
    });

    //修改按钮事件
    $("#updateBtn").click(function(){
        layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;修 改 失 败 ');
        $.ajax({
            url: "修改模板合同URL",
            type: "post",
            dataType: "json",
            data: {},
            success: function(result){
                layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;修 改 失 败 ');
            }
        })
    });

    //另存为按钮事件
    $("#addNewBtn").click(function(){
        layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;另 存 为 失 败 ');
        $.ajax({
            url: "添加模板合同URL",
            type: "post",
            dataType: "json",
            data: {},
            success: function(result){
                layer.msg(' <i class="icon-refresh"></i>&nbsp;&nbsp;另 存 为 失 败 ');
            }
        })
    });
});

