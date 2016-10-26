$(document).ready(function(){
	$(".zzkk .step li:nth-child(3n)").css("margin-right","0");
	$(".srl ul li:nth-child(3n)").css("margin-right","0");
	$(".wdjh li:nth-child(2n)").css("margin-right","0");
	$(".table-rcb td:nth-child(6n) dl,.table-rcb td:nth-child(7n) dl").css("left","-277px");
	$(".table-rcb td p").hover(function(){
		$(this).next("dl").show();
		$(this).next("dl").css("top",$(this).position().top+3);
	}, function() {
		$(this).next("dl").hide();
	})
	$(".m-select").click(function(e){
		$(this).find(".m-select-con").toggle();
		$(this).toggleClass("active");
		e.stopPropagation();
	});
	$(".m-select").hover(function(){
	}, function() {
		$(".m-select-con").hide();
		$(".m-select").removeClass("active");
	})
	//$(document).on('click', function(){
		//$(".m-select-con").hide();
		//$(".m-select").removeClass("active");
	//});
	$(".wdjh-fz-menu").click(function(){
		$(this).parent().next("ul").slideToggle();
		$(this).toggleClass("active");
	});
	$(".m-select li").click(function(){
		 var _this = $(this);
		_this.parent().parent().find("em").text(_this.attr("data-value"));
		_this.addClass("selected").siblings().removeClass("selected");
	});
	//$(".m_search_input").click(function(){
		//$(this).parent().parent().find(".m-search-con").toggle();
	//});
	$(".m-search li").click(function(){
		 var _this = $(this);
		_this.parent().parent().find(".m_search_input").val(_this.attr("data-value"));
		_this.addClass("selected").siblings().removeClass("selected");
		_this.parent().parent().find(".m-search-con").hide();
	});
	//菜单
	$(".btn-del").click(function(){
		$(this).parent().parent().remove();
	})
	//菜单
	$("#menuID ul li").click(function(){
		$(this).addClass("active").siblings("li").removeClass("active");
	})
	$(".set-up").click(function(){
		$("#menuID li").removeClass("active");
	});
	$("#glyd-menu .subNav").click(function(){
		$(this).toggleClass("active").siblings(".subNav").removeClass("active");
		$(this).next(".navContent").slideToggle(500).siblings(".navContent").slideUp(500);
	})
	$("#glyd-menu .navContent a").click(function(){
		$("#glyd-menu .navContent a.active").removeClass("active");
		$(this).addClass("active");
	})	
	$(".btn-glyd-set-up").click(function(){
		$("#glyd-menu .navContent a.active").removeClass("active");
		$(".subNav").removeClass("active");
		$("#glyd-menu .subNav").siblings(".navContent").slideUp(500);
	})
	//标签切换
	$(".tab li").click(function(){
		var index=$(this).index(".tab li");
		$(this).addClass("active").siblings().removeClass("active");
		$($(".tab-con")[index]).show().siblings(".tab-con").hide();
	})	
	//滑动条美化
	$("#xsd-menu,#glyd-menu").mCustomScrollbar({
		theme:"minimal"
	});
	$("#project").mCustomScrollbar({
		theme:"dark",
		axis:"x",
		advanced:{autoExpandHorizontalScroll:true}
	});
	$("#scrollbar-preview,.scrollbar,scrollbar-l").mCustomScrollbar({
		theme:"dark-3"
	});
	
	
});



/*弹出窗*/
function showpop(id,id_bg) {
	parent.parent.parent.document.getElementById(id).style.display = 'block';
	parent.parent.parent.document.getElementById(id_bg).style.display = 'block'; 
}
function closepop(id,id_bg) {
	parent.parent.parent.document.getElementById(id).style.display = 'none';
	parent.parent.parent.document.getElementById(id_bg).style.display = 'none';
}



