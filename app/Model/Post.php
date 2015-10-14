<?php

App::uses('Model', 'Model');

class Post extends AppModel {

	public $validate = [
		'text' => ['notEmpty'],
		'user_id' => ['notEmpty', 'numeric'],
		'category_id' => ['notEmpty', 'numeric'],
	];

	public $hasMany = [
		'Reply' => [
			'className' => 'Post',
			'foreignKey' => 'parent_id',
		]
	];

	public $belongsTo = ['User', 'Category'];

	public function getTimeline($ids){
		if(!is_array($ids)) $ids = [$ids];
		return $this->find('all', [
			'conditions' => [
				'Post.category_id' => $ids,
				'Post.parent_id' => null,
			],
			'order' => ['Post.id' => 'DESC'],
			'contain' => [
				'User',
				'Category',
				'Reply' => [
					'User',
				],
			],
		]);
	}

	public function getMyPost($user_id, $conditions=[]){
		$conditions_ = [
			'Post.user_id' => $user_id,
			'Post.parent_id' => null,
		];
		$conditions = array_merge($conditions, $conditions_);
		$order = ['Post.created' => 'DESC'];
		return $this->find('all', compact('conditions', 'order'));
	}
}
