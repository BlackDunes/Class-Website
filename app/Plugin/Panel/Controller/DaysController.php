<?php
class DaysController extends PanelAppController {

	public function edit($date = null) {
		$this->Day->date = $date;
        if (!$this->Day->exists()) {
            throw new NotFoundException(__('Invalid day'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Day->save($this->request->data)) {
                $this->Session->setFlash(__('The day has been updated'));
                $this->redirect(array('controller' => 'panel'));
            } else {
                $this->Session->setFlash(__('The day could not be saved. Please, try again.'));
            }
        } 
		
	}
	public function add($date = null) {
		$this->set('date', $date);
		$nicedate = date('D\, F jS Y', strtotime($date));
		$this->set('nicedate', $nicedate);
		if ($this->request->is('post')) {
            $this->Day->create();
            if ($this->Day->save($this->request->data)) {
                $this->Session->setFlash(__('You just saved the day.'));
                $this->redirect(array('controller' => 'panel'));
            } else {
                $this->Session->setFlash(__('The day could not be saved. Please, try again.'));
            }
        }
	}

}