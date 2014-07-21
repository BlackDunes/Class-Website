<div class="adminHeader">
	Periods - <?php echo $course['Course']['name']; ?>
</div>
<div class="adminButton"><?php echo $this->Html->link('Add Period',
'/panel/periods/add/'.$course['Course']['id']); ?></div>
	<?php foreach ($periods as $period): ?>
	<div class="contentWidthItem<?php if ($period['Period']['active'] == 0) { echo ' itemInactive'; } ?>">
		<?php echo $period['Period']['name']; ?> <span class="journalEntryDate"><?php echo $period['Period']['schoolYear']; ?></span>
		<div class="contentWidthRight">
			<?php echo $this->Html->link($this->Html->image('edit.png', array('alt' => 'Edit')), '/panel/periods/edit/'.$period['Period']['id'], array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('cal.png', array('alt' => 'View Calendar')), '/panel/periods/generateCal/'.$period['Period']['id'], array('escape' => false, 'target' => '_blank')); ?>
				<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/periods/delete/'.$period['Period']['id'], array('escape' => false), "Are you sure you wish to delete period ".$period['Period']['name']."?"); ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>

<div class="clear">
</div>