<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $uses = array('Post', 'Notification');
	public $autoRender = false;

	public function comment(){
		if(!$this->request->is('post')) throw new NotFoundException();
		$post = $this->request->data('Post');
		$post['user_id'] = $this->Session->read('user_id');
		if($this->Post->save($post)){
			$this->User->increasePostCount($this->Session->read('user_id'));
			$this->redirect('/category/'.$this->request->data('alias'));
		} else {
			echo 'Fail';
		}
	}

	public function like(){
		if(!$this->request->is('post')) throw new NotFoundException();
		$like = $this->request->data('Like');
		$like['user_id'] = $this->user['User']['id'];
		$this->loadModel('Like');
		if($this->Like->addLike($like)){
			$this->Notification->createNotification($like['post_id'], ['like_id'=>$this->Like->getLastInsertId()]);
			echo 'Success';
		} else {
			echo 'Fail';
		}
		$this->set(compact('like'));
	}

	public function reply(){
		if(!$this->request->is('post')) throw new NotFoundException();
		$post = $this->request->data('Post');
		$post['user_id'] = $this->Session->read('user_id');
		if($this->Post->save($post)){
			$this->Notification->createNotification($post['parent_id'], ['post_id'=>$this->Post->getLastInsertId()]);
			if($this->request->data('alias')!==null){
				$this->redirect('/category/'.$this->request->data('alias'));
			} else {
				$this->redirect('/timeline');
			}
		} else {
			echo 'Fail';
		}
	}
}
