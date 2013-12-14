<?php
class HomeworksController extends PanelAppController {

    public function delete($id) {

        $homework = $this->Homework->findById($id);

        if ($this->Homework->delete($id)) {
            $this->Session->setFlash(__('Homework Deleted.'));
            return $this->redirect(array('controller' => 'periods', 'action' => 'day', $homework['Homework']['day_id'], $homework['Homework']['period_id']));
        }
    }

}