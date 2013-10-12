<?php
	class JobCategory extends AppModel {	
		var $name = "JobCategory";
		var $hasMany = array( "Job");
}
