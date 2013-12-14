<?php
class CoursesController extends PanelAppController {

	public function index() {
        $this->Course->unbindModel(array('hasMany' => array('Unit')));
    	$this->set('courses', $this->Course->find('all', array('order' => 'Course.active DESC, Course.name ASC')));
	}

	public function periods($courseid) {

        $Periods = ClassRegistry::init('Period');
		$this->set('periods', $Periods->find('all', array('conditions' => array('Period.course_id' => $courseid),
                                                        'order' => 'Period.block ASC, Period.ab ASC')));

    	$this->set('course', $this->Course->findById($courseid));
	}

	public function add() {

        if ($this->request->is('post')) {

            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved'));
                $this->redirect(array('controller' => 'courses', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid course'));
        }

        $course = $this->Course->findById($id);
        if (!$course) {
            throw new NotFoundException(__('Invalid course'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Course->id = $id;
            if ($this->Course->save($this->request->data)) {
             $this->Session->setFlash(__('The course has been updated.'));
            return $this->redirect(array('controller' => 'courses', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update the course.'));
        }

        if (!$this->request->data) {
            $this->request->data = $course;
            $this->set('course', $this->Course->findById($id));
        }
    }

    public function delete($id) {

        if ($this->Course->delete($id)) {
            $this->Session->setFlash(__('Course Deleted.'));
            return $this->redirect(array('controller' => 'courses', 'action' => 'index'));
        }
    }

    public function setactive($courseid, $unitid) {
        $this->request->data['Course']['active_unit'] = $unitid;
        $this->Course->id = $courseid;
        if ($this->Course->save($this->request->data)) {
            $this->Session->setFlash(__('Active unit updated.'));
            return $this->redirect(array('controller' => 'units', 'action' => 'course', $courseid));
        }
        $this->Session->setFlash(__('Unable to update the active unit.'));
    }

}