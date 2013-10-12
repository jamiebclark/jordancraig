<?php
include('../mobile_device_detect.php');
mobile_device_detect(true,true,true,true,true,true,'http://www.jordancraig.net/mobile',false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css" media="screen">
body { margin:0; padding:0; text-align:center; }
#container { margin:20px auto; width:770px; text-align:left; }
</style>
<script type="text/javascript" src="js/swfobject.js"></script>
<script src="js/swfaddress.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="swffit.js"></script>

<script type="text/javascript">
//<![CDATA[
/************************************************************\
*
\************************************************************/
function getViewportSize() {
    var size = [0, 0];
    if (typeof window.innerWidth != "undefined") {
        size = [window.innerWidth, window.innerHeight];
    }
    else if (typeof document.documentElement != "undefined" && typeof document.documentElement.clientWidth != "undefined" && document.documentElement.clientWidth != 0) {
        size = [document.documentElement.clientWidth, document.documentElement.clientHeight];
    }
    else {
        size = [document.getElementsByTagName("body")[0].clientWidth, document.getElementsByTagName("body")[0].clientHeight];
    }
    return size;
}
/************************************************************\
*
\************************************************************/
function createFullBrowserFlash() {
    swfobject.createCSS("html", "height:100%;");
    swfobject.createCSS("body", "height:100%;");
    swfobject.createCSS("#container", "margin:0; width:100%; height:100%; min-width:770px; min-height:390px;");
    window.onresize = function() {
        var el = document.getElementById("container");
        var size = getViewportSize();
        //el.style.width = size[0] < 770 ? "770px" : "100%";
        el.style.height = size[1] < 500 ? "500px" : "100%";
    };
    window.onresize();
}

var attributes = {id:"bea"};
//swfobject.embedSWF("bea.swf", "content", "874", "400", "9.0.0", null, null, null, attributes);
swfobject.embedSWF("main_new.swf", "content", "100%", "100%", "9", null, null, null, attributes);

if (swfobject.hasFlashPlayerVersion("6.0.0")) {
    swfobject.addDomLoadEvent(createFullBrowserFlash);
	swfobject.addParam("allowFullScreen", "true");
}
//]]>
</script>
</head>
<body>
<div id="container">
<div id="content">
<h1>Alternative content</h1>
<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
</div>
</div>
</body>
</html>