<?php
class VasController extends AppController {

	var $name = 'Vas';

	function admin_index() {
		$this->Va->recursive = 0;
		$this->set('vas', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid va', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('va', $this->Va->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Va->create();
			if ($this->Va->save($this->data)) {
				$this->Session->setFlash(__('The va has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The va could not be saved. Please, try again.', true));
			}
		}
		$locations = $this->Va->Location->find('list');
		$this->set(compact('locations'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid va', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Va->save($this->data)) {
				$this->Session->setFlash(__('The va has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The va could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Va->read(null, $id);
		}
		$locations = $this->Va->Location->find('list');
		$this->set(compact('locations'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for va', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Va->delete($id)) {
			$this->Session->setFlash(__('Va deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Va was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
