<?php
class PackageincludeitemsController extends AppController {

	var $name = 'Packageincludeitems';

	function admin_index() {
		$this->Packageincludeitem->recursive = 0;
		$this->set('packageincludeitems', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid packageincludeitem', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('packageincludeitem', $this->Packageincludeitem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Packageincludeitem->create();
			if ($this->Packageincludeitem->save($this->data)) {
				$this->Session->setFlash(__('The packageincludeitem has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The packageincludeitem could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid packageincludeitem', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Packageincludeitem->save($this->data)) {
				$this->Session->setFlash(__('The packageincludeitem has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The packageincludeitem could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Packageincludeitem->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for packageincludeitem', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Packageincludeitem->delete($id)) {
			$this->Session->setFlash(__('Packageincludeitem deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Packageincludeitem was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>