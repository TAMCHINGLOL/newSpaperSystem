function pic_del(obj,id){
	layer.confirm('确认要删除该图片吗', function(){
		layer.closeAll('dialog'); //关闭信息框
	     $.ajax({
			url: del_pic_url,
			type: 'post',
			dataType: 'json',
			data:{'id':id},
			success:function(result){
				if(result.deleted=="yes"){				
					layer.msg('删除成功');
					setTimeout(layer.closeAll(),"3000");
					location.reload();
				}else if(result.deleted=="no"){
					layer.msg('操作失败');
				}				
			}
	  	})
	});
}

$(function() {
	var bannerSlider = new Slider($('#banner_tabs'), {
		time: 2000,
		delay: 600,
		event: 'hover',
		auto: true,
		mode: 'fade',
		controller: $('#bannerCtrl'),
		activeControllerCls: 'active'
	});
	$('#banner_tabs .flex-prev').click(function() {
		bannerSlider.prev()
	});
	$('#banner_tabs .flex-next').click(function() {
		bannerSlider.next()
	});
	$('.turntab').on('click', function(){
		$('.tab').removeClass('showtab');
		$('.tab:eq('+$(this).index()+')').addClass('showtab');
	});
	$('#add').on('click', function(){
		$('<input type="file" name="pic[]" class="btn btn-success radius mt-5"><br/>').insertBefore($('#add'));
	});
	$('#submit').on('click', function(){
		var fileVal = $('[type=file]:eq(0)').val();
		if(!fileVal){
			alert('请选择图片');
			return false;
		}
		$('.cover-two').addClass('showtab');
		$('.cover-thr').addClass('showtab');
	});

})