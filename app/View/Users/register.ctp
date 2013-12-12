<h2>Register</h2>
<?php
echo $this->Form->create('User', array('class' => 'form-signin'));
echo $this->Form->input('username', array('class' => 'form-control'));
echo $this->Form->input('email', array('class' => 'form-control'));
echo $this->Form->input('twitter_username', array('class' => 'form-control'));
echo $this->Form->input('password', array('class' => 'form-control'));
?>
<?php echo $this->Form->submit(
    	'Register', 
    	array('class' => 'btn btn-lg btn-primary btn-block', 'title' => 'Register')	
	); ?>
<?php echo $this->Form->end(); ?>