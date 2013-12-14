<?php
class JournalEntriesController extends PanelAppController {

	public function index() {
		$Courses = ClassRegistry::init('Course');
        $this->set('courses', $Courses->find('all', array('conditions' => array('Course.journal' => '1'), 'order' => array('Course.active DESC', 'Course.name ASC'))));
	}

	public function course($course_id) {
		$this->set('entries', $this->JournalEntry->find('all', array('conditions' => array('JournalEntry.course_id' => $course_id), 'order' => array('JournalEntry.active DESC', 'JournalEntry.number DESC'))));
		$Courses = ClassRegistry::init('Course');
		$this->set('course', $Courses->findById($course_id));
	}

	public function add($course_id) {
		$this->set('courseId', $course_id);
		$Courses = ClassRegistry::init('Course');
    	$this->set('course', $Courses->findById($course_id));

        if ($this->request->is('post')) {

            $this->JournalEntry->create();
            if ($this->JournalEntry->save($this->request->data)) {
                $this->Session->setFlash(__('The journal entry has been saved'));
                $this->redirect(array('controller' => 'journal_entries', 'action' => 'course', $course_id));
            } else {
                $this->Session->setFlash(__('The journal entry could not be saved. Please, try again.'));
            }
        }
    }

    public function delete($id) {

        $entry = $this->JournalEntry->findById($id);

        if ($this->JournalEntry->delete($id)) {
            $this->Session->setFlash(__('Journal Entry Deleted.'));
            return $this->redirect(array('controller' => 'journal_entries', 'action' => 'course', $entry['JournalEntry']['course_id']));
        }
    }

    public function make_inactive($id) {

        $entry = $this->JournalEntry->findById($id);

        $this->request->data['JournalEntry']['active'] = 0;

        $this->JournalEntry->id = $id;
        if ($this->JournalEntry->save($this->request->data)) {
            $this->Session->setFlash(__('Journal entry now inactive.'));
            return $this->redirect(array('controller' => 'journal_entries', 'action' => 'course', $entry['JournalEntry']['course_id']));
        }
        $this->Session->setFlash(__('Unable to update the entry.'));
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid id'));
        }

        $entry = $this->JournalEntry->findById($id);
        if (!$entry) {
            throw new NotFoundException(__('Invalid id'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->JournalEntry->id = $id;
            if ($this->JournalEntry->save($this->request->data)) {
             $this->Session->setFlash(__('The journal entry has been updated.'));
            return $this->redirect(array('controller' => 'journal_entries', 'action' => 'course', $entry['JournalEntry']['course_id']));
            }
            $this->Session->setFlash(__('Unable to update the journal entry.'));
        }

        if (!$this->request->data) {
            $this->request->data = $entry;
            $this->set('journal_entry', $this->JournalEntry->findById($id));
        }
    }

}