<?php

?>
	<?php echo $this->Html->link(
    	'+ entry',
    	array('controller' => 'entries', 'action' => 'add'), array('class' => 'btn btn-primary')
	); ?>
    <?php foreach ($entries as $entry): ?>
    <hr />
    <h3><?php echo $entry['Entry']['title'];?></h3>
    <small><?php echo $entry['Entry']['creation_date']; ?></small>
    <br />
    <?php echo $entry['Entry']['content']; ?>
    <br />
    <small>Author: </small><?php echo $this->Html->link($entry['User']['username'], 
    	array('controller' => 'users', 'action' => 'view', $entry['User']['id'])); ?>
    <br />
    <?php endforeach; ?>
    <?php unset($entry); ?>
    <br />
    <?php echo $this->Paginator->numbers(array('first' => 'First page'));?>