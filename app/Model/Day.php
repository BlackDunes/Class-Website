<?php
class Day extends AppModel {
	public $virtualFields = array(
		'name' => 'Day.date'
	);
	public $hasMany = array(
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'day_id'
		),
		'Homework' => array(
			'className' => 'Homework',
			'foreignKey' => 'day_id'
		),
	);
}