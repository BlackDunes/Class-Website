<div class="classHeader">
<?php echo $period['Course']['name'] . ": Block " . $period['Period']['name']; ?>
</div>
<div class="weekCalHolder">
<div class="weekCalNav weekCalNavLeft">
		<?php echo $this->Html->link("<",
array('controller' => 'periods', 'action' => 'view', $id, $offset -1)); ?>
</div>
<div class="weekCalNav weekCalNavRight">
		<?php echo $this->Html->link(">",
array('controller' => 'periods', 'action' => 'view', $id, $offset +1)); ?>
</div>
<?php foreach ($weekCalendar as $thecal): ?>
	<div class="dayHolder">
		<?php if ($thecal['today'] == 1): ?>
			<div class="itsToday">
			</div>
		<?php endif; ?>
		<div class="dayHeader 
		<?php if (isset($thecal['abday'])): ?>
			<?php echo $thecal['abday']; ?>_day
			<?php endif; ?>
			<?php if (isset($thecal['noSchool'])): ?>
				noSchool
			<?php endif; ?>">
			<div class="dayHeaderLeft">
				<?php echo $thecal['weekDay'] . ', ' . $thecal['month'] . ' ' . $thecal['dayNumber']; ?>
			</div>
			<?php if (isset($thecal['abday'])): ?>
			<div class="dayHeaderRight">
				<?php echo $thecal['abday']; ?>
			</div>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<?php if ((empty($thecal['noClass'])) & (empty($thecal['noSchool'])) & (empty($thecal['notSet']))): ?>



			<?php if (isset($thecal['halfDay'])): ?>
				<div class="dayHalfDay">
					Half Day
				</div>
			<?php endif; ?>
			<div class="dayAssignHome">
				<div class="dayAssignHomeHeader">
					Classwork:
				</div>
				<ul>
				<?php foreach ($thecal['assignments'] as $assign): ?>
					<li><span class="dayAssignHomeItem"><?php echo $assign['text']; ?></span></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<div class="dayAssignHome hmrk">
				<div class="dayAssignHomeHeader">
					Homework:
				</div>
				<ul>
				<?php foreach ($thecal['homework'] as $homework): ?>
					<li><span class="dayAssignHomeItem"><?php echo $homework['text']; ?></span></li>
				<?php endforeach; ?>
				</ul>
			</div>



		<?php elseif (isset($thecal['noClass'])): ?>
			<?php if (isset($thecal['halfDay'])): ?>
				<div class="dayHalfDay">
					Half Day
				</div>
			<?php endif; ?>
			<div class="dayBigAlert">
				No Class
			</div>
		<?php elseif (isset($thecal['noSchool'])): ?>
			<div class="dayBigAlert dayNoSchool">
				No School
			</div>
		<?php elseif (isset($thecal['notSet'])): ?>
			<div class="dayBigAlert">
				Coming Soon
			</div>
		<?php endif; ?>
	</div>
<?php endforeach; ?>
<div class="clear"></div>
</div>




<br /> <br /><br /><br /><br />