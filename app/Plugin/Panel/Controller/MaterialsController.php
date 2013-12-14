<?php
class MaterialsController extends PanelAppController {

	public function index() {

		$Courses = ClassRegistry::init('Course');
    	$this->set('courses', $Courses->find('all', array('conditions' => array('Course.active' => 1), 'order' => 'Course.name ASC')));

    	$MCategories = ClassRegistry::init('MCategory');
    	$this->set('categories', $MCategories->find('all', array('order' => 'MCategory.name ASC')));

	}

	    public function add($unitId) {
	    	$Unit = ClassRegistry::init('Unit');
	    	$this->set('unit', $Unit->findById($unitId));
	    	$MCategories = ClassRegistry::init('MCategory');
	    	$this->set('mCategories', $MCategories->find('list', array('order' => 'MCategory.name ASC')));

	    	$this->set('m_active_public', $this->Material->findAllByUnitIdAndActiveAndPublic($unitId, 1, 1, array(), array('Material.modified' => 'desc')));

	    	$this->set('m_inactive_public', $this->Material->findAllByUnitIdAndActiveAndPublic($unitId, 0, 1, array(), array('Material.modified' => 'desc')));

	    	$this->set('m_private', $this->Material->findAllByUnitIdAndPublic($unitId, 0, array(), array('Material.modified' => 'desc')));

        	if ($this->request->is('post')) {
        		if ($this->request->data['Material']['local'] == 1) {
            		if (is_uploaded_file($this->request->data['Material']['file']['tmp_name'])){

            			$uploadDir = FILE_UPLOADS_DIR .'materials/'.$unitId.'/';

            			if (!file_exists($uploadDir)) {
            				mkdir($uploadDir);
            			}

                		move_uploaded_file(
                    		$this->request->data['Material']['file']['tmp_name'],
                    		$uploadDir . $this->request->data['Material']['file']['name']
                		);

                		// store the filename in the array to be saved to the db
                		$this->request->data['Material']['file'] = $this->request->data['Material']['file']['name'];
            		} else {
                		echo 'Error uploading file.';
            		}
            	} else {
            		$this->request->data['Material']['file'] = '';
            	}

            	$this->Material->create();
            	if ($this->Material->save($this->request->data)) {
                	$this->Session->setFlash(__('The material has been saved'));
                	$this->redirect(array('controller' => 'materials', 'action' => 'add', $unitId));
            	} else {
                	$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
            	}
        	}
    	}

    public function delete($id) {

        $material = $this->Material->findById($id);

        if ($this->Material->delete($id)) {
            $this->Session->setFlash(__('Material Deleted.'));
            return $this->redirect(array('controller' => 'materials', 'action' => 'add', $material['Material']['unit_id']));
        }
    }

    public function toggle_active($id = null) {

        $material = $this->Material->findById($id);

        if ($material['Material']['active'] == 1) {
            $this->request->data['Material']['active'] = 0;
            $theFlash = $material['Material']['name'].' is now inactive.';
        } else {
            $this->request->data['Material']['active'] = 1;
            $theFlash = $material['Material']['name'].' is now active.';
        }

        $this->Material->id = $id;
        if ($this->Material->save($this->request->data)) {
            $this->Session->setFlash(__($theFlash));
            return $this->redirect(array('controller' => 'materials', 'action' => 'add', $material['Material']['unit_id']));
        }
        $this->Session->setFlash(__('Unable to update the material.'));
        


    }

    public function toggle_private($id = null) {

        $material = $this->Material->findById($id);

        if ($material['Material']['public'] == 1) {
            $this->request->data['Material']['public'] = 0;
            $theFlash = $material['Material']['name'].' is now private.';
        } else {
            $this->request->data['Material']['public'] = 1;
            $theFlash = $material['Material']['name'].' is now public.';
        }

        $this->Material->id = $id;
        if ($this->Material->save($this->request->data)) {
            $this->Session->setFlash(__($theFlash));
            return $this->redirect(array('controller' => 'materials', 'action' => 'add', $material['Material']['unit_id']));
        }
        $this->Session->setFlash(__('Unable to update the material.'));
        


    }

}