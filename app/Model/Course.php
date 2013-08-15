<?php
class Course extends AppModel {
	public $hasMany = array(
		'Period' => array(
			'className' => 'Period',
			'foreignKey' => 'course_id',
			'order'  => 'Period.block ASC',
			'conditions' => array('Period.active' => '1'),
		),
		'Unit' => array(
			'className' => 'Unit',
			'foreignKey' => 'course_id',
			'order' => 'Unit.order ASC'
		)
	);
}