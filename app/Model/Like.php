<?php

App::uses('Model', 'Model');

class Like extends AppModel {

	public $validate = [
		'post_id' => ['notEmpty', 'numeric'],
		'user_id' => ['notEmpty', 'numeric'],
		'type' => ['notEmpty', 'numeric'],
	];

	public $belongsTo = ['Post'];

	public function addLike($data){
		if($this->save($data)){
		App::import('Model', 'Post');
		$this->Post = new Post();
			$this->Post->updateAll(
				['like_'.$data['type'].'_count' => '`like_'.$data['type'].'_count` + 1'],
				['Post.id' => $data['post_id']]
			);
			return true;
		} else {
			return false;
		}
	}
}
