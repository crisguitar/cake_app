<h1>Add Entry</h1>
<?php
echo $this->Form->create('Entry');
echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('content', array('class' => 'form-control'), array('rows' => '3'));
?>
<br/>
<?php
echo $this->Form->submit(
    	'Save Entry', 
    	array('class' => 'btn btn-lg btn-primary'));
echo $this->Form->end();
?>