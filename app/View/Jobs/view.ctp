<h1><?php echo $job['Job']['title'];?></h1>
<h3>Location: <?php echo $job['JobLocation']['title']; ?></h3>
<h3>Posted: <?php echo date('n/j/y', strtotime($job['Job']['created'])); ?></h3>

<h2>Overview</h2>
<?php echo nl2br($job['Job']['overview']); ?>

<h2>Responsibilities</h2>
<?php echo $this->Job->textToList($job['Job']['responsibilities']); ?>

<h2>Qualifications</h2>
<?php echo $this->Job->textToList($job['Job']['qualifications']); ?>

<p><?php echo $this->Html->link('Apply to this job', array(
	'controller' => 'job_applications', 'action' => 'add', $job['Job']['id']
)); ?></p>