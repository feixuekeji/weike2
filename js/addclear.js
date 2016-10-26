(function($){
  $.fn.extend({
    addClear: function(options) {
      var options =  $.extend({
        closeSymbol: "&#10006;",
        color: "#CCC",
        top: 0,
        right: 7,
        returnFocus: true,
        showOnLoad: false,
        onClear: null
      }, options);

      $(this).wrap("<span style='position:relative; line-height:12px' class='add-clear-span'>");
      //$(this).after("<a href='#clear'>"+options.closeSymbol+"</a>");
	  $(this).after("<a href='#clear'><img src='../images/search_close.png' width='16' height='16'></a>");
      $("a[href='#clear']").css({
        color: options.color,
        'text-decoration': 'none',
        display: 'none',
        overflow: 'hidden',
        position: 'absolute',
        right: 5,
		padding:7,
        top: -4
      }, this);

      if($(this).val().length >= 1 && options.showOnLoad === true) {
        $(this).siblings("a[href='#clear']").show();
      }

      $(this).keyup(function() {
        if($(this).val().length >= 1) {
          $(this).siblings("a[href='#clear']").show();
		  $(this).parent().parent().find(".m-search-con").show();
        } else {
          $(this).siblings("a[href='#clear']").hide();
		  $(this).parent().parent().find(".m-search-con").hide();
        }
      });

      $("a[href='#clear']").click(function(){
        $(this).siblings("input").val("");
        $(this).hide();
		$(this).parent().parent().find(".m-search-con").hide();
        if(options.returnFocus === true){
          $(this).siblings("input").focus();
        }
        if (options.onClear){
          options.onClear($(this).siblings("input"));
        }
        return false;
      });
      return this;
    }
  });
})(jQuery);
