<div class="adminHeader">
	Units for <?php echo $course['Course']['name']; ?>
</div>
<div class="adminButton"><?php echo $this->Html->link('Create Unit',
'/panel/units/add/'.$course['Course']['id']); ?></div>
		<?php foreach ($units as $unit): ?>
		<div class="contentWidthItem <?php if ($unit['Unit']['id'] == $unit['Course']['active_unit']) { echo 'green'; } ?>">
			<?php if ($unit['Unit']['type'] == 2) { echo '<i>'; } ?><?php echo $this->Html->link($unit['Unit']['name'],
'/panel/units/view/'.$unit['Unit']['id']); ?><?php if ($unit['Unit']['type'] == 2) { echo '</i> <br /><div class="theAuthor">by '.$unit['Unit']['author'].'</div>' ; } ?>
		</div>
		<?php endforeach; ?>

<div class="clear">
</div>