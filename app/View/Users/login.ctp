<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('class' => 'form-signin')); ?>
    <fieldset>
        <legend><?php echo __('Please Log in'); ?></legend>
        <?php echo $this->Form->input('username', array('class' => 'form-control'));
        echo $this->Form->input('password', array('class' => 'form-control'));
    ?>
    </fieldset>
    <?php echo $this->Form->submit(
    	'Log in', 
    	array('class' => 'btn btn-lg btn-primary btn-block', 'title' => 'Log in')	
	); ?>
<?php echo $this->Form->end(); ?>
</div>