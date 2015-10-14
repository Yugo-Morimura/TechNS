<?php

App::uses('Model', 'Model');

class User extends AppModel {

	public $validate = [
		'name' => ['notEmpty', 'isUnique'],
		'email' => ['notEmpty', 'isUnique'],
		'password' => ['notEmpty'],
	];

	public $hasAndBelongsToMany = array(
		'Category' =>
			array(
				'className' => 'Category',
				'joinTable' => 'users_categories',
				'foreignKey' => 'user_id',
				'associationForeignKey' => 'category_id',
				'unique' => true,
			)
	);

	public function increasePostCount($user_id){
		$this->updateAll(
			['User.post_count' => 'User.post_count + 1'],
			['User.id' => $user_id]
		);
	}

	public function increaseResponsedCount($user_id){
		$this->updateAll(
			['User.responsed_count' => 'User.responsed_count + 1'],
			['User.id' => $user_id]
		);
	}
}
