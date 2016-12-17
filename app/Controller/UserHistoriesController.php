<?php
App::uses('AppController', 'Controller');
/**
 * UserHistories Controller
 *
 * @property UserHistory $UserHistory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UserHistoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserHistory->recursive = 0;
		$this->set('userHistories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserHistory->exists($id)) {
			throw new NotFoundException(__('Invalid user history'));
		}
		$options = array('conditions' => array('UserHistory.' . $this->UserHistory->primaryKey => $id));
		$this->set('userHistory', $this->UserHistory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserHistory->create();
			if ($this->UserHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The user history has been saved.'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user history could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
		$users = $this->UserHistory->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserHistory->exists($id)) {
			throw new NotFoundException(__('Invalid user history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The user history has been saved.'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user history could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('UserHistory.' . $this->UserHistory->primaryKey => $id));
			$this->request->data = $this->UserHistory->find('first', $options);
		}
		$users = $this->UserHistory->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserHistory->id = $id;
		if (!$this->UserHistory->exists()) {
			throw new NotFoundException(__('Invalid user history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserHistory->delete()) {
			$this->Session->setFlash(__('The user history has been deleted.'), 'alert-box', array('class'=>'alert-success'));
		} else {
			$this->Session->setFlash(__('The user history could not be deleted. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
