<?php
class MaterialsController extends PanelAppController {

	public function index() {

		$Courses = ClassRegistry::init('Courses');
    	$this->set('courses', $Courses->find('all'));

    	$MCategories = ClassRegistry::init('MCategories');
    	$this->set('categories', $MCategories->find('all', array('order' => 'MCategories.name ASC')));

	}

}