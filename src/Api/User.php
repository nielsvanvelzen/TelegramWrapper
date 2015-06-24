<?php
namespace Telegram\Api;

class User{
	public $id;
	public $first_name;
	public $last_name;
	public $username;

	public function __construct($data){
		if(isset($data['id']))
			$this->id = $data['id'];

		if(isset($data['first_name']))
			$this->first_name = $data['first_name'];

		if(isset($data['last_name']))
			$this->last_name = $data['last_name'];

		if(isset($data['username']))
			$this->username = $data['username'];
	}
}