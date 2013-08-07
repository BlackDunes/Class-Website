<div class="adminHeader">
	<?php $niceDate = date('D.\ F jS Y', strtotime($day['Days']['date'])); ?>
	<?php echo $niceDate;  ?> (<?php echo $day['Days']['ab']; ?> Day)<br />
	<a href="<?php echo BASE_URL . 'periods/view/' . $thisPeriod['Period']['id']; ?>"><?php echo $thisPeriod['Course']['name'] . ' ' . $thisPeriod['Period']['name']; ?></a>
</div>
<div class="periodDayHolder">Assignments
	<?php if (empty($assignments)): ?>
	<div class="periodDayItemBlank">None found</div>
	<?php endif; ?>
	<?php foreach($assignments as $assignment): ?>
	<div class="periodDayItem"><?php echo $assignment['Assignments']['text']; ?></div>
	<?php endforeach; ?>
</div>
<div class="periodDayHolder">Homework
	<?php if (empty($homeworks)): ?>
	<div class="periodDayItemBlank">None found</div>
	<?php endif; ?>
	<?php foreach($homeworks as $homework): ?>
	<div class="periodDayItem"><?php echo $homework['Homeworks']['text']; ?></div>
	<?php endforeach; ?>
</div>