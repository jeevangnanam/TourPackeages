<?php
class PackageincludesController extends AppController {

	var $name = 'Packageincludes';

	function admin_index() {
		$this->Packageinclude->recursive = 0;
		$this->set('packageincludes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid packageinclude', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('packageinclude', $this->Packageinclude->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Packageinclude->create();
			if ($this->Packageinclude->save($this->data)) {
				$this->Session->setFlash(__('The packageinclude has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The packageinclude could not be saved. Please, try again.', true));
			}
		}
		$packages = $this->Packageinclude->Package->find('list');
		$packageincludeitems = $this->Packageinclude->Packageincludeitem->find('list');
		$this->set(compact('packages', 'packageincludeitems'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid packageinclude', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Packageinclude->save($this->data)) {
				$this->Session->setFlash(__('The packageinclude has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The packageinclude could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Packageinclude->read(null, $id);
		}
		$packages = $this->Packageinclude->Package->find('list');
		$packageincludeitems = $this->Packageinclude->Packageincludeitem->find('list');
		$this->set(compact('packages', 'packageincludeitems'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for packageinclude', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Packageinclude->delete($id)) {
			$this->Session->setFlash(__('Packageinclude deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Packageinclude was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>