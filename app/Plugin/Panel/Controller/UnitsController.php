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

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $unit = $this->Unit->findById($id);
        if (!$unit) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Unit->id = $id;
            if ($this->Unit->save($this->request->data)) {
             $this->Session->setFlash(__('The unit has been updated.'));
            return $this->redirect(array('controller' => 'units', 'action' => 'course', $unit['Unit']['course_id']));
            }
            $this->Session->setFlash(__('Unable to update the unit.'));
        }

        if (!$this->request->data) {
            $this->request->data = $unit;
            $this->set('unit', $this->Unit->findById($id));
        }
    }

    public function delete($id) {

        $unit = $this->Unit->findById($id);

        if ($this->Unit->delete($id)) {
            $this->Session->setFlash(__('Unit Deleted.'));
            return $this->redirect(array('controller' => 'units', 'action' => 'course', $unit['Unit']['course_id']));
        }
    }

    public function up($id = null) {

        $thisUnit = $this->Unit->findById($id);
        $thisOrder = $thisUnit['Unit']['order'];
        $nextOrder = $thisOrder - 1;
        $nextUnit = $this->Unit->find('first', array(
            'conditions' => array('Unit.course_id' => $thisUnit['Unit']['course_id'], 'Unit.order' => $nextOrder)
        ));

        $data = array(
            array(
                'Unit' => array('id' => $nextUnit['Unit']['id'], 'order' => $thisOrder)),
            array(
                'Unit' => array('id' => $thisUnit['Unit']['id'], 'order' => $nextOrder)),
        );
        $theFlash = $thisUnit['Unit']['name'].' has been moved up.';
        if ($this->Unit->saveMany($data)) {
            $this->Session->setFlash(__($theFlash));
            return $this->redirect(array('controller' => 'units', 'action' => 'course', $thisUnit['Unit']['course_id']));
        }
        $this->Session->setFlash(__('Unable to update the unit.'));
        

    }

        public function down($id = null) {

        $thisUnit = $this->Unit->findById($id);
        $thisOrder = $thisUnit['Unit']['order'];
        $nextOrder = $thisOrder + 1;
        $nextUnit = $this->Unit->find('first', array(
            'conditions' => array('Unit.course_id' => $thisUnit['Unit']['course_id'], 'Unit.order' => $nextOrder)
        ));

        $data = array(
            array(
                'Unit' => array('id' => $nextUnit['Unit']['id'], 'order' => $thisOrder)),
            array(
                'Unit' => array('id' => $thisUnit['Unit']['id'], 'order' => $nextOrder)),
        );
        $theFlash = $thisUnit['Unit']['name'].' has been moved down.';
        if ($this->Unit->saveMany($data)) {
            $this->Session->setFlash(__($theFlash));
            return $this->redirect(array('controller' => 'units', 'action' => 'course', $thisUnit['Unit']['course_id']));
        }
        $this->Session->setFlash(__('Unable to update the unit.'));
        

    }

}