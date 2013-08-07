<?php
class Course extends AppModel {
	public $hasMany = array(
		'Period' => array(
			'className' => 'Period',
			'foreignKey' => 'course_id',
			'order'  => 'Period.block ASC'
		),
		'Unit' => array(
			'className' => 'Unit',
			'foreignKey' => 'course_id'
		)
	);
}