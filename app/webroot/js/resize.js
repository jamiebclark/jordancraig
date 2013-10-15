function adjustStyle(width) {
    width = parseInt(width);
    if (width < 400) {
        $("#size-stylesheet").attr("href", "/jordancraig/css/max320.css");
		$(".tinynav").css("display", "block");
		$("#nav").css("display", "none");
		
    } else if ((width >= 400) && (width < 900)) {
        $("#size-stylesheet").attr("href", "/jordancraig/css/max480.css");
		$(".tinynav").css("display", "none");
		$("#nav").css("display", "block");
    } else {
       $("#size-stylesheet").attr("href", "/jordancraig/css/min960.css"); 
	   $(".tinynav").css("display", "none");
		$("#nav").css("display", "block");
    }
}

$(function() {
    adjustStyle($(this).width());
    $(window).resize(function() {
        adjustStyle($(this).width());
    });
});

