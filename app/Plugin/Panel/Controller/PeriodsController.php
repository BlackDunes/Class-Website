<?php
class PeriodsController extends PanelAppController {

	public function day($dateId, $periodId) {
		$this->set('thisPeriod', $this->Period->findById($periodId));

		$Assignment = ClassRegistry::init('Assignments');
		$this->set('assignments', $Assignment->findAllByPeriodIdAndDayId($periodId, $dateId));

		$Homework = ClassRegistry::init('Homeworks');
		$this->set('homeworks', $Homework->findAllByPeriodIdAndDayId($periodId, $dateId));

		$Day = ClassRegistry::init('Days');
		$this->set('day', $Day->findById($dateId));

	}

}