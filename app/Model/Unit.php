<?php
class Unit extends AppModel {
	public $belongsTo = 'Course';
	public $hasMany = array(
		'Material' => array(
			'className' => 'Material',
			'conditions' => array('Material.active' => '1', 'Material.public' => '1'),
			'order' => 'Material.modified DESC'
		)
	);
}