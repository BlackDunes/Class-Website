<div id="mainTitle">
	<?php echo $period['Course']['name']; ?> <?php echo $period['Period']['name']; ?>
</div>
<div id="subTitle">
	<?php echo $period['Period']['schoolYear']; ?>
</div>
<div id="calTitle">
	<?php echo $theCalendar[0]['month'] ?> <?php echo $theCalendar[0]['year'] ?>
</div>
<div id="legend">
	<div id="legendDay">
		Day
	</div>
	<div class="legendAH">
		Assignments
	</div>
	<div class="legendAH">
		Homework
	</div>
	<div class="clear"></div>
</div>
<?php foreach ($theCalendar[0]['dates'] as $day): ?>
<div class="calRow">
	<div class="calDay">
		<div class="calDayNumber">
			<?php echo $day['daynumber']; ?>
		</div>
		<div class="calWeekDay">
			<?php echo $day['weekday']; ?> <?php if ($day['halfday'] == 1) { echo '(SS)'; } ?>
		</div>
	</div>
	<div class="calAssignments">
		<?php foreach ($day['assignments'] as $assignments): ?>
		<div class="calItem<?php if ($assignments['Assignments']['bold'] == 1) { echo ' bold'; } ?><?php if ($assignments['Assignments']['color'] == 1) { echo ' colored'; } ?>">
			&#8226; <?php echo $assignments['Assignments']['text']; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="calHomeworks">
		<?php foreach ($day['homework'] as $homeworks): ?>
		<div class="calItem<?php if ($homeworks['Homeworks']['bold'] == 1) { echo ' bold'; } ?><?php if ($homeworks['Homeworks']['color'] == 1) { echo ' colored'; } ?>">
			&#8226; <?php echo $homeworks['Homeworks']['text']; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="clear"></div>
</div>
<?php endforeach; ?>

<div id="prevMonth">
	<?php if ($offset > 0): ?>
<?php echo $this->Html->link("< Previous Month",
array('controller' => 'periods', 'action' => 'generateCal', $perID, $offset -1)); ?>
	<?php endif; ?>
</div>
<div id="nextMonth">
	<?php if ($offset < 9): ?>
<?php echo $this->Html->link("Next Month >",
array('controller' => 'periods', 'action' => 'generateCal', $perID, $offset +1)); ?>
	<?php endif; ?>
</div>
<div class="clear">
</div>