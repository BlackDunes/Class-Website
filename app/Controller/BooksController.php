<?php
class BooksController extends AppController {
	public function landing() {

		$this->set('randBooks', $this->Book->find('all', array(
			'limit' => 3,
			'order' => 'rand()')
		));
	}
}