<?php
class PackageMetasController extends AppController {

	var $name = 'PackageMetas';

	function admin_index() {
		$this->PackageMeta->recursive = 0;
		$this->set('packageMetas', $this->paginate());
	}

	function admin_view($id = null) {
		
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid package meta', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('packageMeta', $this->PackageMeta->read(null, $id));
	}

	function viewJson($id = null) {
		
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->PackageMeta->recursive = -1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid package meta', true));
			$this->redirect(array('action' => 'index'));
		}
		$packageMeta = $this->PackageMeta->read(null, $id);
		echo json_encode($packageMeta['PackageMeta']);
		die();
	}
	
	function deleteJson($id = null) {
			
			if ('' != $id) {
				$res = $this->PackageMeta->delete($id);
				echo json_encode($res);
			}
			
			die();
		}
		
		
	function admin_add() {
		if (!empty($this->data)) {
			$this->PackageMeta->create();
			if ($this->PackageMeta->save($this->data)) {
				$this->Session->setFlash(__('The package meta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package meta could not be saved. Please, try again.', true));
			}
		}
		$packages = $this->PackageMeta->Package->find('list');
		$this->set(compact('packages'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid package meta', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PackageMeta->save($this->data)) {
				$this->Session->setFlash(__('The package meta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package meta could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PackageMeta->read(null, $id);
		}
		$packages = $this->PackageMeta->Package->find('list');
		$this->set(compact('packages'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for package meta', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PackageMeta->delete($id)) {
			$this->Session->setFlash(__('Package meta deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Package meta was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>