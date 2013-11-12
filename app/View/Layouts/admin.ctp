<?php
echo $this->Html->css('admin');
$this->extend('default');
echo $this->element('admin_menu');
echo $this->fetch('content');

