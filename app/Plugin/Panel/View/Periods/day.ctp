<div class="adminHeader">
	<?php $niceDate = date('D.\ F jS Y', strtotime($day['Days']['date'])); ?>
	<?php echo $niceDate;  ?> (<?php echo $day['Days']['ab']; ?> Day)<br />
	<a href="<?php echo BASE_URL . 'periods/view/' . $thisPeriod['Period']['id']; ?>"><?php echo $thisPeriod['Course']['name'] . ' ' . $thisPeriod['Period']['name']; ?></a>
</div>
<div class="periodDayHolder"><span class="periodDayHead">Assignments</span>
	<?php if (empty($assignments)): ?>
	<div class="periodDayItemBlank">None found</div>
	<?php endif; ?>
	<?php foreach($assignments as $assignment): ?>
	<div class="periodDayItem<?php if ($assignment['Assignments']['bold'] == 1) { echo ' boldItem'; } ?><?php if ($assignment['Assignments']['color'] == 1) { echo ' colorItem'; } ?>">
		<div class="periodDayItemLeft">
			<?php echo $assignment['Assignments']['text']; ?>
		</div>
		<div class="periodDayItemRight">
			<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/assignments/delete/'.$assignment['Assignments']['id'], array('escape' => false), "Are you sure you wish to delete ". $assignment['Assignments']['text']."?"); ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
	<?php echo $this->Form->create('Assignment');
		echo $this->Form->hidden('period_id', array('default' => $periodId));
		echo $this->Form->hidden('day_id', array('default' => $dateId));
        echo $this->Form->input('text', array('label' => false, 'rows' => '3', 'cols' => '20')); ?>
        <div class="periodDayCheckboxHolder">
        <?php echo $this->Form->input('bold', array('div' => 'periodDayCheckbox'));
		echo $this->Form->input('color', array('div' => 'periodDayCheckbox')); ?>
		</div>
        <?php echo $this->Form->end(__('Add Assignment')); ?>
</div>
<div class="periodDayHolder"><span class="periodDayHead">Homework</span>
	<?php if (empty($homeworks)): ?>
	<div class="periodDayItemBlank">None found</div>
	<?php endif; ?>
	<?php foreach($homeworks as $homework): ?>
	<div class="periodDayItem<?php if ($homework['Homeworks']['bold'] == 1) { echo ' boldItem'; } ?><?php if ($homework['Homeworks']['color'] == 1) { echo ' colorItem'; } ?>">
		<div class="periodDayItemLeft">
			<?php echo $homework['Homeworks']['text']; ?>
		</div>
		<div class="periodDayItemRight">
			<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/homeworks/delete/'.$homework['Homeworks']['id'], array('escape' => false), "Are you sure you wish to delete ". $homework['Homeworks']['text']."?"); ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
	<?php echo $this->Form->create('Homework');
		echo $this->Form->hidden('period_id', array('default' => $periodId));
		echo $this->Form->hidden('day_id', array('default' => $dateId));
        echo $this->Form->input('text', array('label' => false, 'rows' => '3', 'cols' => '20')); ?>
        <div class="periodDayCheckboxHolder">
        <?php echo $this->Form->input('bold', array('div' => 'periodDayCheckbox'));
		echo $this->Form->input('color', array('div' => 'periodDayCheckbox')); ?>
		</div>
        <?php 
        echo $this->Form->end(__('Add Homework')); ?>
</div>
<div class="clear"></div>