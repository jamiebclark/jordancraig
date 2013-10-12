<?php
	class JobsController extends AppController{
		function index() {
			$jobs=$this->Job->find("all");
			$this->set("jobs", $jobs);
		}
	}