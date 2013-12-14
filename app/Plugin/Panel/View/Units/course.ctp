<div class="adminHeader">
	Units for <?php echo $course['Course']['name']; ?>
</div>
<div class="adminButton"><?php echo $this->Html->link('Create Unit',
'/panel/units/add/'.$course['Course']['id']); ?></div>
		<?php foreach ($units as $unit): ?>
		<div class="contentWidthItem <?php if ($unit['Unit']['id'] == $unit['Course']['active_unit']) { echo 'green'; } ?>">
			<div class="contentWidthLeft">
			<?php if ($unit['Unit']['type'] == 2) { echo '<i>'; } ?><?php echo $this->Html->link($unit['Unit']['name'],
'/panel/units/view/'.$unit['Unit']['id']); ?><?php if ($unit['Unit']['type'] == 2) { echo '</i> <br /><div class="theAuthor">by '.$unit['Unit']['author'].'</div>' ; } ?>

			</div>
			<div class="contentWidthRight">
				<?php if ($unit['Unit']['id'] != $unit['Course']['active_unit']) { ?>
				<?php echo $this->Html->link($this->Html->image('active.png', array('alt' => 'Make Active')), '/panel/courses/setactive/'.$course['Course']['id'].'/'.$unit['Unit']['id'], array('escape' => false)); ?>
				<?php } ?>
				<?php if ($unit['Unit']['order'] > 1) {echo $this->Html->link($this->Html->image('arrowup.png', array('alt' => 'Reorder Up')), '/panel/units/up/'.$unit['Unit']['id'], array('escape' => false));} ?>
				<?php $num = count($course['Unit']); ?>
				<?php if ($unit['Unit']['order'] < $num) {echo $this->Html->link($this->Html->image('arrowdown.png', array('alt' => 'Reorder Down')), '/panel/units/down/'.$unit['Unit']['id'], array('escape' => false));} ?>
				<?php echo $this->Html->link($this->Html->image('edit.png', array('alt' => 'Edit')), '/panel/units/edit/'.$unit['Unit']['id'], array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/units/delete/'.$unit['Unit']['id'], array('escape' => false), "Are you sure you wish to delete ". $unit['Unit']['name']."?"); ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php endforeach; ?>

<div class="clear">
</div>