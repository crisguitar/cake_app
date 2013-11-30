<h1>Add Entry</h1>
<?php
echo $this->Form->create('Entry');
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '3'));
echo $this->Form->end('Save Entry');
?>