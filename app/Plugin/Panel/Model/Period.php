<?php
class Period extends AppModel {

	public $virtualFields = array(
		'name' => "CONCAT(Period.block, Period.ab)"
	);
	public $displayField = 'name';
	public $belongsTo = 'Course';

}