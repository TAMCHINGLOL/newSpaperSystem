$(function() {
    setInterval(iFrameHeight, 100);
});


var height = 0;
var ifm;

function iFrameHeight() {

    ifm = document.getElementById("mainFrame");
    var subWeb = document.frames ? document.frames["mainFrame"].document : ifm.contentDocument;
    var siderbarWidth = $('#sidebar-collapse').width;

    if (ifm != null && subWeb != null) {
        height = subWeb.body.scrollHeight;
        ifm.height = subWeb.body.scrollHeight;
        ifm.width = '100%';
    }
}



function openFrame(url, id) {
    $("#indexImageDiv").css('display',"none");
    var ifm = document.getElementById("mainFrame");
    ifm.height = 500;
    $('.active').removeClass("active");
    $('#' + id).addClass("active");
    $('#' + id).parent().parent().addClass("active");

    //获取left点击导航层级内容
    var firstType = $("#"+id).parent().parent().children("a").children("span").text().replace( /^\s*/, '');
    var secondType = $("#"+id).children("a").text().replace( /^\s*/, '');

    $('#mainFrame').attr("src", url);                       //指定iframe跳转url
    $("#firstLevel").remove();                              //移除存在的层级内容1
    $("#secondLevel").remove();                             //移除存在的层级内容2
    $('#breadcrumb1').append("<li id='firstLevel'><a href='#'>"+firstType+"</a></li>");     //追加层级内容1
    $('#breadcrumb1').append('<li class="active" id="secondLevel">'+secondType+'</li>');    //追加层级内容2

}
