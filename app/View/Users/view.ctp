<div class="row">
	<div class="col-md-8">
		<h2><?php echo h($user['User']['username']); ?></h2>
		<?php foreach ($user['Entry'] as $entry): ?>
			<hr />
		    <h3><?php echo $entry['title'];?></h3>
		    <small><?php echo $entry['creation_date']; ?></small>
		    <br />
		    <?php echo $entry['content']; ?>
		    <br />
		<?php endforeach; ?>
		<?php unset($entry); ?>
	</div>
	<div class="col-md-4">
		<div class="tweets-container">
			<h2>Tweets</h2>
			<div class="tweets">
				<?php foreach ($tweets as $tweet): ?>
					<hr />
					<?php echo($tweet['text']);?>
				<?php endforeach; ?>
				<?php unset($entry); ?>
			</div>
		</div>
	</div>
</div>
