/**
 * Created by ludezheng on 2016/8/22.
 */
function attrBtn(id,state,uid){
    if(id){
        layer.msg("审核正在提交,请耐心等待",{time: 2000});
        var loadLayer = layer.load(1, {icon: 1,time: 30*1000});
        $.ajax({
            //timeOut: 600000,
            url: submit_attr_url,
            type: 'post',
            dataType: 'json',
            data: {id: id,statuses: state,uid: uid},
            success: function(result){
                if(result.status == 1){
                    layer.close(loadLayer);
                    if(state == "1"){
                        document.getElementById(id).innerHTML="";
                        document.getElementById(id).innerHTML="<label style='color: red'>审核通过</label>";

                    }else if(state == "2"){
                        document.getElementById(id).innerHTML="";
                        document.getElementById(id).innerHTML="<label style='color: red'>审核不通过</label>";

                    }
                }else if(result.status == 0){
                    layer.close(loadLayer);
                    layer.alert("服务器繁忙，请稍后重试!");
                    //layer.alert(result.info);
                }},error: function(XMLHttpRequest){
                    layer.close(loadLayer);
                    layer.alert("服务器繁忙，请稍后重试");

                    //if(XMLHttpRequest.status == 200 && XMLHttpRequest.readyState == 4){
                    //    layer.close(loadLayer);
                    //    if(state == "1"){
                    //        document.getElementById(id).innerHTML="";
                    //        document.getElementById(id).innerHTML="<label style='color: red'>审核通过</label>";
                    //
                    //    }else if(state == "2"){
                    //        document.getElementById(id).innerHTML="";
                    //        document.getElementById(id).innerHTML="<label style='color: red'>审核不通过</label>";
                    //
                    //    }
                    //}else{
                    //    layer.close(loadLayer);
                    //    layer.alert("服务器繁忙，请稍后重试");
                    //}
                }
        });
    }
}