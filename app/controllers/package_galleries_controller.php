<?php
class PackageGalleriesController extends AppController {

	var $name = 'PackageGalleries';

	function index() {
		$this->PackageGallery->recursive = 0;
		$this->set('packageGalleries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid package gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('packageGallery', $this->PackageGallery->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PackageGallery->create();
			if ($this->PackageGallery->save($this->data)) {
				$this->Session->setFlash(__('The package gallery has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package gallery could not be saved. Please, try again.', true));
			}
		}
		$packages = $this->PackageGallery->Package->find('list');
		$this->set(compact('packages'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid package gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PackageGallery->save($this->data)) {
				$this->Session->setFlash(__('The package gallery has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package gallery could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PackageGallery->read(null, $id);
		}
		$packages = $this->PackageGallery->Package->find('list');
		$this->set(compact('packages'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for package gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PackageGallery->delete($id)) {
			$this->Session->setFlash(__('Package gallery deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Package gallery was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
