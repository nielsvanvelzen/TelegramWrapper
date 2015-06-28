<?php
namespace Telegram\Types;

class Message
{
	/**
	 * @var int
	 */
	private $message_id;

	/**
	 * @var User
	 */
	private $from;

	/**
	 * @var GroupChat|User
	 */
	private $chat;

	/**
	 * @var int
	 */
	private $date;

	public function __construct($data){
		if(isset($data['message_id']))
			$this->message_id = $data['message_id'];

		if(isset($data['from']))
			$this->from = new User($data['from']);

		if(isset($data['chat']))
			$this->chat = isset($data['chat']['title']) ? new GroupChat($data['chat']) : new User($data['chat']);

		if(isset($data['date']))
			$this->date = $data['date'];
	}
}