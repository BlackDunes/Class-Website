<div id="mainTitle">
	<?php echo $period['Course']['name']; ?> <?php echo $period['Period']['name']; ?>
</div>
<div id="subTitle">
	<?php echo $period['Period']['schoolYear']; ?>
</div>
<div id="calTitle">
	<?php echo $theCalendar[0]['month'] ?> <?php echo $theCalendar[0]['year'] ?>
</div>
<?php foreach ($theCalendar[0]['dates'] as $day): ?>
<div class="calRow">
	<div class="calDay">
		<div class="calDayNumber">
			<?php echo $day['daynumber']; ?>
		</div>
		<div class="calWeekDay">
			<?php echo $day['weekday']; ?>
		</div>
	</div>
	<div class="calAssignments">
		<?php foreach ($day['assignments'] as $assignments): ?>
		<div class="calItem">
			&#8226; <?php echo $assignments['Assignments']['text']; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="calHomeworks">
		<?php foreach ($day['homework'] as $homeworks): ?>
		<div class="calItem">
			&#8226; <?php echo $homeworks['Homeworks']['text']; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="clear"></div>
</div>
<?php endforeach; ?>

<br /><br />
	<pre>
		<?php print_r ($theCalendar); ?>
	</pre>