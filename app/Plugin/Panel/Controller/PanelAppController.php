<?php
class PanelAppController extends AppController {

 	public $helpers = array('Html', 'Form');

	function beforeFilter() {
		$this->Auth->deny();
		
	}

}