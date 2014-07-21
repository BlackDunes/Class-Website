<?php
class PeriodsController extends PanelAppController {

	public function day($dateId, $periodId) {

		if ($this->request->is('post')) {
			if (isset($this->request->data['Assignment'])) {
				$Assignment = ClassRegistry::init('Assignments');
				$Assignment->create();
				if ($Assignment->save($this->request->data['Assignment'])) {
					$this->Session->setFlash('Assignment saved.');
				} else {
					$this->Session->setFlash('There was an error.');
				}
			} else if (isset($this->request->data['Homework'])) {
				$Homework = ClassRegistry::init('Homeworks');
				$Homework->create();
				if ($Homework->save($this->request->data['Homework'])) {
					$this->Session->setFlash('Homework saved.');
				} else {
					$this->Session->setFlash('There was an error.');
				}
			} else {
				$this->Session->setFlash('There was an error.');
			}
		}

		$this->data = null;

		$this->set('thisPeriod', $this->Period->findById($periodId));

		$Assignment = ClassRegistry::init('Assignments');
		$this->set('assignments', $Assignment->findAllByPeriodIdAndDayId($periodId, $dateId));

		$Homework = ClassRegistry::init('Homeworks');
		$this->set('homeworks', $Homework->findAllByPeriodIdAndDayId($periodId, $dateId));

		$Day = ClassRegistry::init('Days');
		$this->set('day', $Day->findById($dateId));

		$this->set('dateId', $dateId);

		$this->set('periodId', $periodId);

	}

	public function add($courseid) {
		$this->set('courseId', $courseid);
		$Courses = ClassRegistry::init('Course');
    	$this->set('course', $Courses->findById($courseid));

        if ($this->request->is('post')) {

            $this->Period->create();
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('The period has been saved'));
                $this->redirect(array('controller' => 'courses', 'action' => 'periods', $courseid));
            } else {
                $this->Session->setFlash(__('The period could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid period'));
        }

        $period = $this->Period->findById($id);
        if (!$period) {
            throw new NotFoundException(__('Invalid period'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Period->id = $id;
            if ($this->Period->save($this->request->data)) {
             $this->Session->setFlash(__('The period has been updated.'));
            return $this->redirect(array('controller' => 'courses', 'action' => 'periods', $period['Period']['course_id']));
            }
            $this->Session->setFlash(__('Unable to update the period.'));
        }

        if (!$this->request->data) {
            $this->request->data = $period;
            $this->set('period', $this->Period->findById($id));
        }
    }

    public function delete($id) {

        $period = $this->Period->findById($id);

        if ($this->Period->delete($id)) {
            $this->Session->setFlash(__('Period Deleted.'));
            return $this->redirect(array('controller' => 'courses', 'action' => 'periods', $period['Period']['course_id']));
        }
    }

    public function generateCal($id, $offset=0) {

        $this->set('title_for_layout', 'Cal');
        $this->layout = 'bare';
        $this->set('period', $this->Period->findById($id));

        $this->loadModel('Calendar');
        $this->set('theCalendar', $this->Calendar->periodCal($id, $offset));

        $this->set('offset', $offset);
        $this->set('perID', $id);

    }

}