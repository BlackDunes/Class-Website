<?php
class MCategoriesController extends PanelAppController {

	public function add() {
        if ($this->request->is('post')) {
            if (is_uploaded_file($this->request->data['MCategory']['icon']['tmp_name']))
            {
                move_uploaded_file(
                    $this->request->data['MCategory']['icon']['tmp_name'],
                    IMG_UPLOADS_DIR .'mcat/' . $this->request->data['MCategory']['icon']['name']
                );

                // store the filename in the array to be saved to the db
                $this->request->data['MCategory']['icon'] = $this->request->data['MCategory']['icon']['name'];
            } else {
                echo 'Whups.';
            }

            $this->MCategory->create();
            if ($this->MCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved'));
                $this->redirect(array('controller' => 'materials', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->MCategory->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->MCategory->id = $id;
            if ($this->MCategory->save($this->request->data)) {
             $this->Session->setFlash(__('The category has been updated.'));
            return $this->redirect(array('controller' => 'materials', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update the category.'));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }

}