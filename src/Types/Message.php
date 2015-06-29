<?php
namespace Telegram\Types;

class Message
{
	/**
	 * @var int
	 */
	public $message_id;

	/**
	 * @var User
	 */
	public $from;

	/**
	 * @var GroupChat|User
	 */
	public $chat;

	/**
	 * @var int
	 */
	public $date;

	/**
	 * @var string|null
	 */
	public $text;

	/**
	 * @param array $data
	 */
	public function __construct($data)
	{
		if(isset($data['message_id']))
			$this->message_id = $data['message_id'];

		if(isset($data['from']))
			$this->from = new User($data['from']);

		if(isset($data['chat']))
			$this->chat = isset($data['chat']['title']) ? new GroupChat($data['chat']) : new User($data['chat']);

		if(isset($data['date']))
			$this->date = $data['date'];

		if(isset($data['text']))
			$this->text = $data['text'];
	}
}