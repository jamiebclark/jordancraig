//Finds Script Directory
var scripts = document.getElementsByTagName('script');
var path = scripts[scripts.length-1].src.split('?')[0];      // remove any ?query
var scriptDir = path.split('/').slice(0, -1).join('/')+'/';  // remove last filename part of path


function adjustStyle(width) {
    width = parseInt(width);
	
    if (width < 400) {
        $("#size-stylesheet").attr("href", scriptDir + "../css/max320.css");
		$(".tinynav").css("display", "block");
		$("#nav").css("display", "none");
		
    } else if ((width >= 400) && (width < 900)) {
        $("#size-stylesheet").attr("href", scriptDir + "../css/max480.css");
		$(".tinynav").css("display", "none");
		$("#nav").css("display", "block");
    } else {
       $("#size-stylesheet").attr("href", scriptDir + "../css/min960.css"); 
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