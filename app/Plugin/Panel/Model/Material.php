<?php
class Material extends PanelAppModel {
	public $belongsTo = array(
		'MCategory' => array('className' => 'MCategory'),
		'Unit' => array('className' => 'Unit')
	);
}