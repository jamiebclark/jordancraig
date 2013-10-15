<?php 
	$this->Html->css('slide960', null, array('inline' => false))."\n";
	$this->Html->script('jquery.jcarousel.min', array('inline' => false));
	$this->Html->script('script', array('inline' => false));
?>
<div id="list">
	<ul id="slider" class="jcarousel-skin-tango">
		<li><?php echo $this->Html->image("lb/lb_1.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_2.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_3.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_4.jpg", array('width' => 240,'height' => 370,));?></li>		
		<li><?php echo $this->Html->image("lb/lb_5.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_6.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_7.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_8.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_9.jpg", array('width' => 240,'height' => 370,));?></li>
		<li><?php echo $this->Html->image("lb/lb_10.jpg", array('width' => 240,'height' => 370,));?></li>
	</ul>
</div>
