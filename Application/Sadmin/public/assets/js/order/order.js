//三个改变就触发事件
jQuery(function($) {
    $('#search').click(function() {
        submitSearch();
    });
    $("#pay_code_list").change(function() {
        submitSearch();
    });
    $("#order_status_list").change(function() {
        submitSearch();
    });
});

//当三个参数改变时触发的事件
function submitSearch(){
    var keyword = $("#keywords").val();
    var pay_code = $("#pay_code_list").val();
    var order_status = $('#order_status_list').val();

}