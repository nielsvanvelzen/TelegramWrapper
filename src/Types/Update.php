<?php
namespace Telegram\Types;

class Update
{
	/**
	 * @var int
	 */
	public $update_id;

	/**
	 * @var Message
	 */
	public $message;

	public function __construct($data)
	{
		if (isset($data['update_id']))
			$this->update_id = intval($data['update_id']);

		if (isset($data['message']))
			$this->message = new Message($data['message']);
	}
}