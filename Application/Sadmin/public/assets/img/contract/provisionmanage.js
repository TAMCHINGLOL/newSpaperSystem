/**
 * Created by TAM_CHING_LOL on 2016/8/3.
 */
function postProvision(){
    var provisionName = $("#provisionName").val;
    var provisionContent = $("#provisionContent").val;
    if(provisionContent == "" || provisionName == ""){
        layer.confirm('请填写完整信息',{
            btn : ['确定']
        });
        return false;
    }else{
        $.ajax({
            url : "",
            type : "post",
            dataType : "json",
            data : {provisionName:provisionName,provisionContent:provisionContent},
            success : function(result){
                if(result.status == 'yes'){
                    window.location.href = '';
                }else{
                    layer.confirm('请重新添加',{
                        btn : ['确定']
                    });
                }
            }
        });
    }
}