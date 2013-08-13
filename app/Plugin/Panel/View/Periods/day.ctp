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
	<div class="periodDayItem"><?php echo $assignment['Assignments']['text']; ?></div>
	<?php endforeach; ?>
	<?php echo $this->Form->create('Assignment');
		echo $this->Form->hidden('period_id', array('default' => $periodId));
		echo $this->Form->hidden('day_id', array('default' => $dateId));
        echo $this->Form->input('text', array('label' => false, 'rows' => '3'));
        echo $this->Form->end(__('Add Assignment')); ?>
</div>
<div class="periodDayHolder"><span class="periodDayHead">Homework</span>
	<?php if (empty($homeworks)): ?>
	<div class="periodDayItemBlank">None found</div>
	<?php endif; ?>
	<?php foreach($homeworks as $homework): ?>
	<div class="periodDayItem"><?php echo $homework['Homeworks']['text']; ?></div>
	<?php endforeach; ?>
	<?php echo $this->Form->create('Homework');
		echo $this->Form->hidden('period_id', array('default' => $periodId));
		echo $this->Form->hidden('day_id', array('default' => $dateId));
        echo $this->Form->input('text', array('label' => false, 'rows' => '3'));
        echo $this->Form->end(__('Add Homework')); ?>
</div>
<div class="clear"></div>