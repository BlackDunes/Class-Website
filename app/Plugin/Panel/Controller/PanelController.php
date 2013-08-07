<?php
class PanelController extends PanelAppController {

	public function index() {
		$this->loadModel('Calendar');
		$this->set('upcomingWeeks', $this->Calendar->upcomingWeeks(2));
	}
	
}