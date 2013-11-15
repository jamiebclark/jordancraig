<?php 
	$this->Html->css('grid960', null, array('inline' => false))."\n";
	$this->Html->css('flexslider', null, array('inline' => false))."\n";
	$this->Html->css('webdev', null, array('inline' => false))."\n";
?>
<div class="slidernav"></div>
	<section class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li><?php echo $this->Html->image("campaign/c_1.jpg");?></li>
				<li><?php echo $this->Html->image("campaign/c_2.jpg");?></li>
				<li><?php echo $this->Html->image("campaign/c_3.jpg");?></li>
				<li><?php echo $this->Html->image("campaign/c_4.jpg");?></li>
			</ul>
		</div>
	</section>
<?php 
	$this->Html->script('jquery.flexslider', array('inline' => false));
?>
<script type="text/javascript">
    $(window).load(function(){
		$('.flexslider').flexslider({
			start: function(slider){
				$('body').removeClass('loading');
					$('.flex-direction-nav li').eq(0).css({
						right : '50px',
						top : '-26px'
					});
		$('.flex-direction-nav li').eq(1).css({
			left : '50px',
			top : '-26px'
		});
		}
      });
    });
</script>