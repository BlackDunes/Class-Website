<?php
class PanelAppController extends AppController {

 	public $helpers = array('Html', 'Form');

	function beforeFilter() {
		$pluralModels = array();
		$theModels = App::objects('model');
		$theModels = array_diff($theModels, array("AppModel", "Calendar"));
		foreach ($theModels as $singularModel) {
			$pluralModel = Inflector::pluralize($singularModel);
			array_push($pluralModels, $pluralModel);
		}
		$this->set('theModels', $pluralModels);
		$this->Auth->deny();
		
	}

}