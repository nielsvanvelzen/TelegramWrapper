<?php
namespace Telegram\Types;

class GroupChat
{
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $title;

	public function __construct($data)
	{
		if (isset($data['id']))
			$this->id = intval($data['id']);

		if (isset($data['title']))
			$this->title = $data['title'];
	}
}