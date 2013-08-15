<?php
class UnitsController extends PanelAppController {

	public function index() {
		$Courses = ClassRegistry::init('Course');
    	$this->set('courses', $Courses->find('all', array('order' => 'Course.active DESC, Course.name ASC')));
	}

	public function course($courseid) {

		$this->set('units', $this->Unit->findAllByCourseId($courseid, array(), array('Unit.order' => 'ASC')));

		$Courses = ClassRegistry::init('Course');
    	$this->set('course', $Courses->findById($courseid));
	}

	public function add($courseid) {
		$this->set('courseId', $courseid);
		$Courses = ClassRegistry::init('Course');
    	$this->set('course', $Courses->findById($courseid));

        if ($this->request->is('post')) {

            $numUnits = $this->Unit->find('count', array('conditions' => array('Unit.course_id' => $courseid)));

            $this->request->data['Unit']['order'] = ++$numUnits;

            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('controller' => 'units', 'action' => 'course', $courseid));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        }
    }

}