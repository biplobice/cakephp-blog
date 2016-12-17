<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		//'DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			'loginRedirect'	=> array('controller' => 'users', 'action' => 'index'),
			'logoutRedirect'=> array('controller' => 'users', 'action' => 'login'),
			'authError'		=> 'You must be logged in to view this page.',
			'loginError'	=> 'Invalid Username or Password, please try again.'
		)
	);
	
	public $helpers = array('Form' => array('className' => 'Bs3Form'));
	//public $helpers = array('Form' => array('className' => 'BootstrapForm'));
	
	public function beforeFilter() {
		if (isset($this->request->params['admin'])) {
			$this->log('An admin prefix call is being made.');
			$this->layout = 'admin';
		}
		
		// Allow login form display
		$this->Auth->Allow('login', 'admin_add');
	}

    public function beforeRender() {
        // set global variable for view
        $btn_success = array('label' => 'Submit', 'class' => 'submit btn btn-success');
        $btn_primary = array('label' => 'Update', 'class' => 'submit btn btn-primary');
        $this->set(compact('btn_success'));
        $this->set(compact('btn_primary'));
    }  
		
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		return true;
	}
}
