<?php
class AssignmentsController extends PanelAppController {

    public function delete($id) {

        $assignment = $this->Assignment->findById($id);

        if ($this->Assignment->delete($id)) {
            $this->Session->setFlash(__('Assignment Deleted.'));
            return $this->redirect(array('controller' => 'periods', 'action' => 'day', $assignment['Assignment']['day_id'], $assignment['Assignment']['period_id']));
        }
    }

}