<div class="row">
	<div class="col-md-8">
		<h2><?php echo h($user['User']['username']); ?></h2>
		<?php echo $this->Html->link(
        	'+ entry',
        		array('controller' => 'entries', 'action' => 'add'), array('class' => 'btn btn-primary')
    			); 
    	?>
		<?php foreach ($user['Entry'] as $entry): ?>
			<hr />
		    <h3><?php echo $entry['title'];?></h3>
		    <small><?php echo $entry['creation_date']; ?></small>
		    <?php 
		    	if($user['User']['id'] == $this->Session->read('Auth.User.id')) {
        			echo $this->Html->link('Edit', 
		            array('controller' => 'entries', 'action' => 'edit', $entry['id'])); 
    			}
    		?>
		    <br />
		    <?php echo $entry['content']; ?>
		    <br />
		<?php endforeach; ?>
		<?php unset($entry); ?>
	</div>
	<div class="col-md-4">
		<div class="tweets-container">
			<h2>Latest Tweets</h2>
			<div class="tweets">
				<?php foreach ($tweets as $tweet): ?>
					<?php 
						$tweetIsOwnedByTheCurrentUser = $this->requestAction(
							array('controller' => 'tweets', 
								'action' => 'userIsOwner', 
								$tweet['id_str'], $this->Session->read('Auth.User.id')));
						$tweetIsHidden = $this->requestAction(
							array('controller' => 'tweets', 
								'action' => 'userIsOwner', 
								$tweet['id_str'], $user['User']['id']));
						if(!$tweetIsHidden || $tweetIsOwnedByTheCurrentUser) {
					?>
					<hr/>
					<?php 
						$tweetAction = 'Hide';
						$tweetCSSClass = 'normal-tweet';
						if($tweetIsHidden) {
							$tweetAction = 'Show';
							$tweetCSSClass = 'hidden-tweet';
						}
					?>
					<span class="<?php echo $tweetCSSClass; ?>" id="<?php echo $tweet['id_str']; ?>">
						<?php echo($tweet['text']); ?>
					</span>
					<?php 
						if($this->Session->read('Auth.User') && $user['User']['id'] == $this->Session->read('Auth.User.id')) {
							echo $this->Ajax->link(
						    	$tweetAction,
						    	array( 'controller' => 'tweets', 'action' => 'hideShowToggle', $tweet['id_str'], $user['User']['id']),
						    	array( 'update' => 'tweets', 'onmouseup' => 'hideAnimation(this);')
							);
						}
					}
					?>	
				<?php endforeach; ?>
				<?php unset($entry); ?>
			</div>
		</div>
	</div>
</div>
