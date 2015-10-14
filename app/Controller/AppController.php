<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $components = ['Session'];
	public $uses = ['User'];

	public function beforeFilter(){
		if(!$this->Session->check('user_id')){
			if(!$this->name==='users' || !($this->action==='index' || $this->action==='login' || $this->action==='add')){
				$this->redirect('/');
			}
		} else {
			$this->user = $this->User->find('first', [
				'conditions' => ['User.id' => $this->Session->read('user_id')],
			]);
			$this->set(['user'=>$this->user]);
		}
	}
}
