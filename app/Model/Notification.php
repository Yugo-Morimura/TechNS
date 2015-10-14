<?php

App::uses('Model', 'Model');

class Notification extends AppModel {

	public $validate = [
	];

	public function createNotification($parent_post_id, $data_id=[]){
		App::import('Model', 'Post');
		$this->Post = new Post();
		$parent_post = $this->Post->findById($parent_post_id);
		$user_id = $parent_post['Post']['user_id'];
		App::import('Model', 'User');
		$this->User = new User();
		$this->User->increaseResponsedCount($user_id);
		if(isset($data_id['post_id'])){
			$post_id = $data_id['post_id'];
			return $this->save(compact('user_id', 'post_id'));
		} else {
			$like_id = $data_id['like_id'];
			return $this->save(compact('user_id', 'like_id'));
		}
	}
}