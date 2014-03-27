function mycarousel_itemVisibleInCallbackBeforeAnimation(carousel, item, idx, state) {
    if (state == 'init')
        return;
    jQuery('img', item).fadeIn('fast');
};

function mycarousel_itemVisibleOutCallbackBeforeAnimation(carousel, item, idx, state) {
    jQuery('img', item).fadeOut('fast');
};

$(document).ready(function() {
    $('#slider').jcarousel({
        scroll: 1,
		wrap: 'circular'		
    })
	.jcarouselAutoscroll({
    target: '+=1',
    interval: 3000
    });
	
$('.flex-direction-nav li').eq(0).css('border', '1px solid red');
//	$('img.captify').captify({
//				speedOver: 'fast',
//				speedOut: 'normal',
//				hideDelay: 500,
				// 'fade', 'slide', 'always-on'
//				animation: 'slide',
//				prefix: '',
//				opacity: '0.7',
//				className: 'caption-bottom',
//				position: 'bottom'
//});
});