<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

    public function admin_login() {
        $this->layout = 'login';
        // if already logged in, redirect
        if($this->Session->check('Auth.User')) {
            $this->redirect(array('action' => 'admin_index'));
        }
        
        // if we get the pos information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')), 'alert-box', array('class'=>'alert-success'));
                //$this->redirect($this->Auth->redirectUrl());
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password'), 'alert-box', array('class'=>'alert-danger'));
            }
        }
    }
    
    public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }	

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

    public function admin_change_password($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Password has been changed successfully.'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Password could not be changed. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
            }
        }
    }


/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'), 'alert-box', array('class'=>'alert-success'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
