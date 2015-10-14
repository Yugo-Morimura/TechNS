<?php

App::uses('Model', 'Model');

class UsersCategory extends AppModel {

	public $validate = [
		'user_id' => ['notEmpty', 'numeric'],
		'category_id' => ['notEmpty', 'numeric', 'uniqueValidation'],
	];

	public function uniqueValidation($check){
		$count = $this->find('count', [
			'conditions' => [
				'user_id' => $this->data['UsersCategory']['user_id'],
				'category_id' => $this->data['UsersCategory']['category_id'],
			],
		]);
		echo 'OK';
		$this->log(print_r($this->data, true), LOG_DEBUG);
		return (int)$count === 0;
	}
}
