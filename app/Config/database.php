<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql3.firebird.netowl.jp',
		'login' => 't12_leve',
		'password' => 'leverages',
		'database' => 't12_leve',
		'prefix' => '',
		'encoding' => 'utf8',
	);

	public $local = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 't12_leve',
		'prefix' => '',
		'encoding' => 'utf8',
	);

	public function __construct() {
		if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
			$this->default = $this->local;
		}
	}
}
