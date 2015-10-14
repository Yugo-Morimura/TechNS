<?php

App::uses('Model', 'Model');

class Category extends AppModel {

	public $validate = [
		'alias' => ['notEmpty'],
		'name' => ['notEmpty'],
	];

	public function getCategoryByAlias($alias){
		$category = $this->find('first', [
			'conditions' => ['Category.alias' => $alias],
			'recursive' => -1,
		]);
		return (isset($category['Category'])) ? $category : null;
	}

}
