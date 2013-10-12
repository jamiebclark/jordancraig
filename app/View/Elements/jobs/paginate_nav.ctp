<?php
/**
 * Job Paginate Navigation Menu
 * The default style for the numbered page menu to go before and after job listings
 **/
echo $this->Paginator->numbers(array(
	'before' => $this->Paginator->prev(),
	'after' => $this->Paginator->next(),
));
