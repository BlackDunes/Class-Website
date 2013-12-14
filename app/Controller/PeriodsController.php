<?php
class PeriodsController extends AppController {
	public $helpers = array('Html', 'Form');
	public function view($id, $offset=0) {

		$this->Period->unbindModel(array('hasMany' => array('Assignment', 'Homework')));
		$this->set('period', $this->Period->findById($id));
		$period = $this->Period->findById($id);
		$this->loadModel('Unit');
		$this->Unit->unbindModel(array('belongsTo' => array('Course')));
		$this->set('activeUnit', $this->Unit->findById($period['Course']['active_unit']));
		$activeUnit = $this->Unit->findById($period['Course']['active_unit']);
		$this->set('allUnits', $this->Unit->find('all', array(
			'conditions' => array(
				'Unit.course_id' => $period['Course']['id'],
				'Unit.order <=' => $activeUnit['Unit']['order']
				),
			'order' => 'Unit.order DESC',
			'recursive' => 2
			)
		));
		$this->loadModel('Calendar');
		$this->set('weekCalendar', $this->Calendar->weekCal($id, $offset));
		if ($period['Course']['journal'] == 1) {
			$this->loadModel('JournalEntry');
			$this->JournalEntry->unbindModel(array('belongsTo' => array('Course')));
			$this->set('journalEntries', $this->JournalEntry->find('all', array(
				'conditions' => array(
					'JournalEntry.course_id' => $period['Course']['id'],
					'JournalEntry.active' => 1
					),
				'order' => 'JournalEntry.number DESC'
				)
			));
		}
		$this->set('offset', $offset);
		$this->set('id', $id);


	}
}