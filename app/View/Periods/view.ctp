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
					<li><span class="dayAssignHomeItem<?php if ($assign['bold'] == 1) { echo ' boldItem'; } ?><?php if ($assign['color'] == 1) { echo ' colorItem'; } ?>"><?php echo $assign['text']; ?></span></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<div class="dayAssignHome hmrk">
				<div class="dayAssignHomeHeader">
					Homework:
				</div>
				<ul>
				<?php foreach ($thecal['homework'] as $homework): ?>
					<li><span class="dayAssignHomeItem<?php if ($homework['bold'] == 1) { echo ' boldItem'; } ?><?php if ($homework['color'] == 1) { echo ' colorItem'; } ?>"><?php echo $homework['text']; ?></span></li>
				<?php endforeach; ?>
				</ul>
			</div>


		<?php elseif ((isset($thecal['abday'])) and (($thecal['abday'] == "M") or ($thecal['abday'] == "F"))): ?>

			<?php if ($thecal['abday'] == "M"): ?>

				<?php if (isset($thecal['halfDay'])): ?>
					<div class="dayHalfDay">
						Half Day
					</div>
				<?php endif; ?>
				<div class="dayBigAlert">
					Midterms
				</div>

			<?php endif; ?>
			<?php if ($thecal['abday'] == "F"): ?>

				<?php if (isset($thecal['halfDay'])): ?>
					<div class="dayHalfDay">
						Half Day
					</div>
				<?php endif; ?>
				<div class="dayBigAlert">
					Finals
				</div>

			<?php endif; ?>
		
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
<div class="perLeft">
	We are currently studying...
	<div class="perLeftUnit">
		<?php if ($activeUnit['Unit']['type'] == 2) { echo '<i>'; } ?>
		<?php echo $activeUnit['Unit']['name']; ?>
		<?php if ($activeUnit['Unit']['type'] == 2) { echo '</i><div class="perLeftAuthor">by '.$activeUnit['Unit']['author'].'</div>'; } ?>
	</div>
	<?php if ($period['Course']['journal'] == 1): ?>
	<div class="journalHeader">
		Journal Entries
	</div>
	<?php foreach ($journalEntries as $entries): ?>
	<div class="journalHolder">
		<div class="journalEntryHeader">
			<div class="journalHeaderLeft">
				<?php echo $this->Html->image('journal.png', array('alt' => 'Journal Entry')); ?> <?php echo $entries['JournalEntry']['number']; ?>
			</div>
			<div class="journalHeaderRight">
				<?php $nicedate = date('D\. F jS\, Y', strtotime($entries['JournalEntry']['date'])) ?>
				<?php echo $nicedate; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="journalEntryEntry">
			<?php echo $entries['JournalEntry']['entry']; ?>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
<div class="perRight">
	<?php foreach ($allUnits as $thisUnit): ?>
	<?php foreach ($thisUnit['Material'] as $material): ?>

	<div class="perRightItemHolder">
		<div class="rightItemImage">
			<?php echo $this->Html->image('uploads/mcat/'.$material['MCategory']['icon'], array('alt' => $material['MCategory']['name'])); ?>
		</div>
		<div class="rightItemName">
			<span style="color: #<?php echo $material['MCategory']['color']; ?>">
			<?php if ($material['local'] == 1): ?>
			<?php echo $this->Html->link($material['name'], '/files/uploads/materials/'. $thisUnit['Unit']['id'].'/'.$material['file'], array('target' => '_blank')); ?>
			<?php else: ?>
			<?php echo $this->Html->link($material['name'], $material['url'], array('target' => '_blank')); ?>
			<?php endif; ?>
			</span>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
	<?php endforeach; ?>
</div>
<div class="clear"></div>
