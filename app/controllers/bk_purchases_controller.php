<?php
class PurchasesController extends AppController {

	var $name = 'Purchases';

	function admin_index() {
		/*App::import('Component', 'Session');
	    $Session = new SessionComponent();
	    $user = $Session->read('Auth.User');//User or Admin or 
	    debug($user);*/
		//echo $this->Auth->user('id');
		$this->Purchase->recursive = 0;
		$this->set('purchases', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchase', $this->Purchase->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Purchase->create();
			if ($this->Purchase->save($this->data)) {
				$this->Session->setFlash(__('The purchase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Purchase->User->find('list');
		$packages = $this->Purchase->Package->find('list');
		$hotels = $this->Purchase->Hotel->find('list');
		$coupons = $this->Purchase->Coupon->find('list',array('fields'=>'coupon'));
		$this->set(compact('users', 'packages', 'hotels', 'coupons'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Purchase->save($this->data)) {
				$this->Session->setFlash(__('The purchase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Purchase->read(null, $id);
		}
		$users = $this->Purchase->User->find('list');
		$packages = $this->Purchase->Package->find('list');
		$hotels = $this->Purchase->Hotel->find('list');
		$coupons = $this->Purchase->Coupon->find('list');
		$this->set(compact('users', 'packages', 'hotels', 'coupons'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Purchase->delete($id)) {
			$this->Session->setFlash(__('Purchase deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
