<?php
class Material extends AppModel {
	
	public $belongsTo = array(
		'MCategory' => array('className' => 'MCategory', 'type' => 'INNER'),
		'Unit' => array('className' => 'Unit', 'counterCache' => true,)
	);

}