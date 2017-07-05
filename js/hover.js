//边框效果--移入
function biankuang(obj){
    $(obj).find('.biankuang_1').stop(true).animate({
        height:'305px'
    },300)
    $(obj).find('.biankuang_2').stop(true).delay(300).animate({
        width:'360px'
    },300)
    $(obj).find('.biankuang_3').stop(true).animate({
        height:'305px'
    },300)
    $(obj).find('.biankuang_4').stop(true).delay(300).animate({
        width:'360px'
    },300)
}
//边框效果--移出
function biankuang1(obj){

    $(obj).find('.biankuang_1').stop(true).delay(100).animate({
        height:'0px'
    },100)
    $(obj).find('.biankuang_2').stop(true).animate({
        width:'0px'
    },100)
    $(obj).find('.biankuang_3').stop(true).delay(100).animate({
        height:'0px'
    },100)
    $(obj).find('.biankuang_4').stop(true).animate({
        width:'0px'
    },100)
}
//触发
$('.spbq').hover(
	function () {
	  var obj = $(this);
			$(obj).find('.text_gobuy').addClass('text_gobuy_show');
			$(obj).find('.search_y').animate({left:'150',opacity:1},300);
		biankuang(obj);
	},
	function () {
	  var obj = $(this);
		$(obj).find('.text_gobuy').removeClass('text_gobuy_show');
		$(obj).find('.search_y').animate({left:'100',opacity:0},300);
		biankuang1(obj);
	}
);