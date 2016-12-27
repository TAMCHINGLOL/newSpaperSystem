/**
 * Created by ludezheng on 2016/8/5.
 */

//页面加载完毕
$(document).ready(function(){
    var contractId = $('#contractPart').find('input#contractId').val();    //获取模板id

    //修改按钮事件(更新合同模板)
    $("#saveBtn").click(function(){
        var contractHeader = $('#contractHeader').find('input#contractNameId').val();   //获取模板名字
        var contractContent = ue.getContent();                              //获取编辑器内容
        contractContent = contractContent.replace( /^\s*/, '');             //去除左空格
        if(contractContent.length > 0){
            var content = ue.getContent();
            $.ajax({                                                        //修改(更新)模板
                url: update_contract_book_url,
                type: 'post',
                dataType: 'json',
                data: {bookContent: content,bookId: contractId,bookName: contractHeader},
                success: function(result){
                    if(result.status == 1){
                        layer.msg('<i class="icon-refresh"></i>修 改 成 功',
                            {time: 3000},
                            function(){
                                parent.layer.closeAll();
                            }
                        );
                    }else if(result.status == 0){
                        if(result.info == "error"){
                            layer.msg("修 改 失 败");
                        }else{
                            layer.alert("服务器繁忙,请稍后再试");             //系统错误
                        }
                    }else{
                        layer.msg('<i class="icon-refresh"></i>修 改 成 功');
                    }
                },
                error: function(){
                    layer.msg('<i class="icon-refresh"></i>修 改 失 败');
                }
            });
        }else{
            layer.alert(" 请 添 加 合 同 内 容",{
                icon: 6,
                time: 2000
            });
        }
    });

    //保存按钮事件(保存合同模板)
    $("#nextBtn").click(function(){
        var contractHeader = $('#contractHeader').find('input#contractNameId').val();   //获取模板名字
        var contractContent = ue.getContent();                              //获取编辑器内容
        contractContent = contractContent.replace( /^\s*/, '');             //去除左空格
        if(contractContent.length > 0){
            var content = ue.getContent();
            $.ajax({                                                        //修改(更新)模板
                url: add_contract_book_url,
                type: 'post',
                dataType: 'json',
                data: {bookContent: content,bookName: contractHeader},
                success: function(result){
                    if(result.status == 1){
                        layer.msg('<i class="icon-refresh"></i>保 存 成 功',
                            {time: 3000},
                            function(){
                                parent.layer.closeAll();
                            }
                        );
                    }else if(result.status == 0){
                        //layer.alert(result.info+" 请输入新的模板名",{icon: 6}
                        //layer.alert(result.info,{icon: 6}
                        layer.alert('模版名字已存在!',{icon: 6}
                        );
                    }
                    else if(result.status == 2){
                        layer.alert('保 存 失 败',{icon: 6}
                        );
                    }
                },
                error: function(){
                    layer.msg('<i class="icon-refresh"></i>保 存 失 败');
                }
            });
        }else{
            layer.alert(" 请 添 加 合 同 内 容",{
                icon: 6,
                time: 2000
            });
        }
    });

});




