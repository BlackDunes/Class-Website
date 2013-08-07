<?php
class BooksController extends PanelAppController {

	public function index() {
		$todayWeekDay = date('N');
    	$today = date('Y-m-d');
    	if ($todayWeekDay == 7) {
    		$startDate = $today;
    		$today = date('Y-m-d', strtotime($today.' +1 week'));
    	} else {
    		$startDate = date('Y-m-d', strtotime($today.' -1 week'));
    	}

    	$ourResults = array();

    	for($count = -1; $count <= 5; $count++) {
    		$currResult = array();
    		$currWeek = date('W', strtotime($startDate));
    		$currYear = date('Y', strtotime($startDate));
    		$currResult = $this->Book->findByWeek($currWeek);
    		if (!$currResult) {
    			$currResult = array('none');
    		}

			$ourResults[$count] =  $currResult;
			$weekOf = 'Week of ' . date('M jS', strtotime($currYear.'W'.$currWeek));
			if ($currWeek == date('W', strtotime($today))) {
				$ourResults[$count]['weekOf'] = 'This week';
			} else if ($currWeek == date('W', strtotime($today.' -1 week'))) {
				$ourResults[$count]['weekOf'] = 'Last week';
			} else if ($currWeek == date('W', strtotime($today.' +1 week'))) {
				$ourResults[$count]['weekOf'] = 'Next week';
			} else {
				$ourResults[$count]['weekOf'] = $weekOf;
			}
			$ourResults[$count]['weekNum'] = $currWeek;
			$startDate = date('Y-m-d', strtotime($startDate.' +1 week'));
    	}
    	$this->set('theBooks', $ourResults);
	}

    public function add($week = null) {
        $this->set('week', $week);
        if ($this->request->is('post')) {
            if (is_uploaded_file($this->request->data['Book']['cover']['tmp_name']))
            {
                move_uploaded_file(
                    $this->request->data['Book']['cover']['tmp_name'],
                    UPLOADS_DIR .'book/' . $this->request->data['Book']['cover']['name']
                );

                // store the filename in the array to be saved to the db
                $this->request->data['Book']['cover'] = $this->request->data['Book']['cover']['name'];
            } else {
                echo 'Whups.';
            }

            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved'));
                $this->redirect(array('controller' => 'books', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'));
            }
        }
    }

    public function view($week = null) {
        $this->set('week', $week);
        $this->set('ourBook', $this->Book->findByWeek($week));
    }

}