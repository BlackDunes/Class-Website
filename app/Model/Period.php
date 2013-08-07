<?php
class Period extends AppModel {

	public $virtualFields = array(
		'name' => "CONCAT(Period.block, Period.ab)"
	);
	public $displayField = 'name';
	public $belongsTo = 'Course';
	public $hasMany = array(
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'period_id'
		),
		'Homework' => array(
			'className' => 'Homework',
			'foreignKey' => 'period_id'
		),
	);

}