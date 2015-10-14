<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

	public $uses = array('UsersCategory', 'Category');

	public function subscribe(){
		$user_id = (int)$this->user['User']['id'];
		$category_id = isset($this->request->params['id']) ? (int)$this->request->params['id'] : -100;
		$this->_unsubscribe($user_id, floor(($category_id-1)/3)*3+1);
		$this->_unsubscribe($user_id, floor(($category_id-1)/3)*3+2);
		$this->_unsubscribe($user_id, floor(($category_id-1)/3)*3+3);
		$this->_subscribe($user_id, $category_id);
		$category = $this->Category->findById($category_id);
		$this->redirect('/category/'.$category['Category']['alias']);
	}

	public function unsubscribe(){
		$this->_unsubscribe($this->user['User']['id'], $this->request->params['id']);
		$this->redirect('/timeline');
	}

	public function _subscribe($user_id, $category_id){
		$data = compact('user_id', 'category_id');
		if($category_id === 0) $this->redirect('/timeline');
		$count = $this->UsersCategory->find('count', ['conditions'=>$data]);
		if((int)$count > 0) $this->redirect('/timeline');
		return $this->UsersCategory->save($data);
	}

	public function _unsubscribe($user_id, $category_id){
		$this->UsersCategory->deleteAll([
			'user_id' => $user_id,
			'category_id' => $category_id,
		]);
	}
}
