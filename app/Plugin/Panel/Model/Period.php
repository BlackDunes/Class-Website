<?php
class Period extends AppModel {

	public $virtualFields = array(
		'name' => "CONCAT(Period.block, Period.ab)",
		'schoolYear' => "CONCAT(Period.year, '-', Period.year + 1)"
	);
	public $displayField = 'name';
	public $belongsTo = 'Course';

}