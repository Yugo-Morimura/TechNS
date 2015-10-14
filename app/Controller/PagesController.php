<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array('Post', 'Category');

	public function beforeFilter(){
		parent::beforeFilter();

		$all_categories = $this->Category->find('all');
		$this->set(compact('all_categories'));
	}

	public function timeline(){
		$category_ids = Hash::extract($this->user, 'Category.{n}.id');
		$posts = $this->Post->getTimeline($category_ids);
		$this->set(compact('category_ids', 'posts'));
	}

	public function category(){
		$category_alias = $this->request->params['alias'];
		$category = $this->Category->getCategoryByAlias($category_alias);
		$posts = $this->Post->getTimeline($category['Category']['id']);
		$this->set(compact('category', 'posts'));
	}

	public function my_posts(){
		$this->layout = false;
		$my_posts = $this->Post->getMyPost($this->user['User']['id']);
		$this->set(compact('my_posts'));
	}

	public function my_posts_liked(){
		$this->layout = false;
		$my_posts = $this->Post->getMyPost($this->user['User']['id'], [
			'NOT' => [
				'AND' => [
					'like_0_count' => 0,
					'like_1_count' => 0,
					'like_2_count' => 0,
					'like_3_count' => 0,
					'reply_count' => 0,
				],
			],
		]);
		$this->set(compact('my_posts'));
		$this->render('my_posts');
	}
}
