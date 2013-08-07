<div class="panelCalHolder">
	<div class="panelCalRow">
		<div class="panelCalWeekDay">
			Monday
		</div>
		<div class="panelCalWeekDay">
			Tuesday
		</div>
		<div class="panelCalWeekDay">
			Wednesday
		</div>
		<div class="panelCalWeekDay">
			Thursday
		</div>
		<div class="panelCalWeekDay">
			Friday
		</div>
		<div class="clear"></div>
	</div>
	<?php foreach ($upcomingWeeks as $currWeek): ?>
	<div class="panelCalRow">
		<?php foreach ($currWeek["week"] as $currDay): ?>
		<div class="panelCalDay<?php if ($currDay["today"] == 1): ?><?php echo " dayToday"; ?><?php endif; ?> ">
			<div class="panelCalDayHeader<?php if (isset($currDay["abday"])): ?><?php echo " ".$currDay["abday"]."_day"; ?><?php endif; ?><?php if (isset($currDay["noschool"]) or (isset($currDay["halfday"]))): ?><?php echo " noSchool"; ?><?php endif; ?>">
				<div class="calDayHeaderLeft">
					<?php echo $this->Html->link($currDay["month"].' '.$currDay["daynumber"], array('controller' => 'days', 'action' => 'edit', $currDay["sqldate"])); ?>
				</div>
				<div class="calDayHeaderRight">
					<?php if (isset($currDay["abday"])): ?>
						<?php echo $currDay["abday"]; ?>
					<?php endif; ?>
					<?php if (isset($currDay["halfday"])): ?>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="panelCalDayBody">

				
				<?php if (isset($currDay["incomplete"])): ?>
					<div class="calDayBodyAlert">
						<div class="updateDayButton">
						<a href="<?php echo BASE_URL.'panel/days/add/'.$currDay["sqldate"]; ?>">Update Date</a>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($currDay["noschool"])): ?>
					<div class="calDayBodyAlert">
					<?php echo "No School"; ?>
					</div>
				<?php endif; ?>
				<?php if (isset($currDay['classes'])): ?>
					<?php for ($theNumber = 1; $theNumber <=5; $theNumber++): ?>
						<?php if ($theNumber != 3): ?>
						<div class="calDayBodyRow">
							<div class="calDayBodyLeft">
							<?php echo $theNumber . $currDay["abday"]; ?>: 
							</div>
							<div class="calDayBodyRight<?php if (isset($currDay['classesincomplete'][$theNumber])) { if ($currDay['classesincomplete'][$theNumber] == 0) { echo ' missingStuff'; } } ?>">
							<?php if (isset($currDay['classes'][$theNumber])): ?>
								<?php echo $this->Html->link($currDay['classes'][$theNumber]['name'], array('controller' => 'periods', 'action' => 'day', $currDay['dayId'], $currDay['classes'][$theNumber]['id'])); ?>
								
							<?php endif; ?>
							</div>
							<div class="clear"></div>
						</div>
						<?php endif; ?>
					<?php endfor; ?>
				<?php endif; ?>


			</div>
		</div>
		<?php endforeach; ?>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
</div>
	