<?php

App::uses('AppController', 'Controller');

class NotificationsController extends AppController {

	public $uses = ['Notification'];
	public $layout = false;

	public function fetchCount(){
		$this->autoRender = false;
		echo $this->Notification->find('count', [
			'conditions' => [
				'Notification.user_id' => $this->user['User']['id'],
			],
		]);
	}

	public function fetchContent(){
		$notifications = $this->Notification->find('all', [
			'conditions' => [
				'Notification.user_id' => $this->user['User']['id'],
			],
			'limit' => 15,
		]);
		$this->set(compact('notifications'));
	}

	public function delete($id){
		$this->autoRender = false;
		$count = $this->Notification->find('first', [
			'conditions' => [
				'id' => $id,
				'user_id' => $this->user['User']['id'],
			],
		]);
		if((int)$count > 0){
			$this->Notification->delete($id);
			echo 'OK';
		} else {
			echo 'Fail';
		}
	}

	public function delete_displayed(){
		$this->autoRender = false;
		$notifications = $this->Notification->find('all', [
			'conditions' => [
				'user_id' => $this->user['User']['id'],
			],
			'limit' => 15,
		]);
		$notification_ids = Hash::extract($notifications, '{n}.Notification.id');
		$this->Notification->deleteAll([
			'Notification.id' => $notification_ids,
		]);
		echo 'OK';
	}

}
