

<h1 class="job"><?php echo $job['Job']['title'];?></h1>
<h3 class="job">Location: <?php echo $job['JobLocation']['title']; ?></h3>
<h3 class="job">Posted: <?php echo date('n/j/y', strtotime($job['Job']['created'])); ?></h3>

<h2 class="job">Overview</h2>
<?php echo nl2br($job['Job']['overview']); ?>

<h2 class="job">Responsibilities</h2>
<?php echo $this->Job->textToList($job['Job']['responsibilities']); ?>

<h2 class="job">Qualifications</h2>
<?php echo $this->Job->textToList($job['Job']['qualifications']); ?>

<p class="apply"><?php echo $this->Html->link('Apply to this job', array(
	'controller' => 'job_applications', 'action' => 'add', $job['Job']['id']
)); ?></p>