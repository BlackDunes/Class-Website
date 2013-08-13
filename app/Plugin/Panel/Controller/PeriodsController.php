<?php
class PeriodsController extends PanelAppController {

	public function day($dateId, $periodId) {

		if ($this->request->is('post')) {
			if (isset($this->request->data['Assignment'])) {
				$Assignment = ClassRegistry::init('Assignments');
				$Assignment->create();
				if ($Assignment->save($this->request->data['Assignment'])) {
					$this->Session->setFlash('Assignment saved.');
				} else {
					$this->Session->setFlash('There was an error.');
				}
			} else if (isset($this->request->data['Homework'])) {
				$Homework = ClassRegistry::init('Homeworks');
				$Homework->create();
				if ($Homework->save($this->request->data['Homework'])) {
					$this->Session->setFlash('Homework saved.');
				} else {
					$this->Session->setFlash('There was an error.');
				}
			} else {
				$this->Session->setFlash('There was an error.');
			}
		}

		$this->data = null;

		$this->set('thisPeriod', $this->Period->findById($periodId));

		$Assignment = ClassRegistry::init('Assignments');
		$this->set('assignments', $Assignment->findAllByPeriodIdAndDayId($periodId, $dateId));

		$Homework = ClassRegistry::init('Homeworks');
		$this->set('homeworks', $Homework->findAllByPeriodIdAndDayId($periodId, $dateId));

		$Day = ClassRegistry::init('Days');
		$this->set('day', $Day->findById($dateId));

		$this->set('dateId', $dateId);

		$this->set('periodId', $periodId);

	}

}