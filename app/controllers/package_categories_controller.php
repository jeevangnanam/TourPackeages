<?php
class PackageCategoriesController extends AppController {

	var $name = 'PackageCategories';

	function admin_index() {
		$this->PackageCategory->recursive = 0;
		$this->set('packageCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid package category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('packageCategory', $this->PackageCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PackageCategory->create();
			if ($this->PackageCategory->save($this->data)) {
				$this->Session->setFlash(__('The package category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package category could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid package category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PackageCategory->save($this->data)) {
				$this->Session->setFlash(__('The package category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PackageCategory->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for package category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PackageCategory->delete($id)) {
			$this->Session->setFlash(__('Package category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Package category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
