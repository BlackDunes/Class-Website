<?php
class PeriodsController extends AppController {
	public $helpers = array('Html', 'Form');
	public function view($id, $offset=0) {

		$this->set('period', $this->Period->findById($id));
		$this->loadModel('Calendar');
		$this->set('weekCalendar', $this->Calendar->weekCal($id, $offset));
		$this->set('offset', $offset);
		$this->set('id', $id);


	}
}