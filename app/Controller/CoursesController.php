<?php
class CoursesController extends AppController {
	public $helpers = array('Html', 'Form');
	public function index() {
		$this->set('courses', $this->Course->find('all', array('conditions' => array('Course.active' => 1))));

		$todayWeekDay = date('N');
    	$thisWeek = date('W');
    	$today = date('Y-m-d');
    	if ($todayWeekDay == 7) {
    		$thisWeek = date('W', strtotime($today .' +1 week'));
    	}
    	$Books = ClassRegistry::init('Books');
    	$this->set('ourBook', $Books->findByWeek($thisWeek));
	}
}