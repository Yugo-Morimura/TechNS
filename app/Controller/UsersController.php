<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $uses = array('User');
	public $layout = false;
	
	public function beforeFilter(){
		parent::beforeFilter();

	}

	public function index(){

	}

	public function login() {
		$user_data = $this->request->data('User');
		$user = $this->User->find('first', [
			'conditions'=>[
				'User.email' => $user_data['email'],
				'User.password' => $user_data['password'],
			],
		]);
		if(empty($user)) {
			$this->redirect('/');
		} else {
			$this->Session->write('user_id', $user['User']['id']);
			$this->redirect('/timeline');
		}
	}

	public function add() {
		$this->log($this->request->data, LOG_DEBUG);
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->Session->write('user_id', (int)$this->User->getLastInsertId());
				$this->redirect('/timeline');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->redirect('/');
			}
		} else {
			$this->redirect('/');
		}
	}

	public function logout(){
		$this->Session->delete('user_id');
		$this->redirect('/');
	}
}
