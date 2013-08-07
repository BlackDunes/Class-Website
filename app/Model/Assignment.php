<?php
class Assignment extends AppModel {
	public $belongsTo = array(
		'Day' => array(
			'className' => 'Day',
			'foreignKey' => 'day_id'
		),
		'Period' => array(
			'className' => 'Period',
			'foreignKey' => 'period_id'
		)
	);
}