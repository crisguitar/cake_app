<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('custom');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('tweet_animation');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('Amazing Posts',
			array('controller' => 'entries', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
        </td>
        </div>
        <div class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
          	<?php if($this->Session->read('Auth.User')) { ?>
          		<li>
          			<?php echo $this->Html->link('Welcome ' . $this->Session->read('Auth.User.username'),
					array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id'))); ?>
				</li>
          		<li>
          			<?php echo $this->Html->link('Log-out',
						array('controller' => 'users', 'action' => 'logout')); ?>
          		</li>
			<?php } else { ?>
            	<li>
            		<?php echo $this->Html->link('Log-in',
						array('controller' => 'users', 'action' => 'login')); ?>
            	</li>
            	<li>
            		<?php echo $this->Html->link('Register',
						array('controller' => 'users', 'action' => 'register')); ?>
            	</li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
	<div class="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<hr/>
		<div class="footer">
			<div class="container">
				
			</div>
		</div>
	</div>
	
</body>
</html>
