<?php
namespace Telegram\Types;

class GroupChat{
	public $id;
	public $title;

	public function __construct($data){
		if(isset($data['id']))
			$this->id = $data['id'];

		if(isset($data['title']))
			$this->title = $data['title'];
	}
}