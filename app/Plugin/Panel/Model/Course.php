<?php
class Course extends PanelAppModel {

	public $hasMany = array('Unit' => array('order' => 'Unit.order ASC'),
						'Period');
	
}