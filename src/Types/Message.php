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
	 * @var int
	 */
	public $date;

	/**
	 * @var GroupChat|User
	 */
	public $chat;

	/**
	 * @var User|null
	 */
	public $forward_from;

	/**
	 * @var int|null
	 */
	public $forward_date;

	/**
	 * @var Message|null
	 */
	public $reply_to_message;

	/**
	 * @var string|null
	 */
	public $text;

	/**
	 * @var Audio|null
	 */
	public $audio;

	/**
	 * @var Document|null
	 */
	public $document;

	/**
	 * @var PhotoSize[]|null
	 */
	public $photo;

	/**
	 * @var Sticker|null
	 */
	public $sticker;

	/**
	 * @var Video|null
	 */
	public $video;

	/**
	 * @var Contact|null
	 */
	public $contact;

	/**
	 * @var Location|null
	 */
	public $location;

	/**
	 * @var User|null
	 */
	public $new_chat_participant;

	/**
	 * @var User|null
	 */
	public $left_chat_participant;

	/**
	 * @var string|null
	 */
	public $new_chat_title;

	/**
	 * @var PhotoSize[]|null
	 */
	public $new_chat_photo;

	/**
	 * @var bool|null
	 */
	public $delete_chat_photo = false;

	/**
	 * @var bool|null
	 */
	public $group_chat_created = false;

	/**
	 * @param array $data
	 */
	public function __construct($data)
	{
		if (isset($data['message_id']))
			$this->message_id = intval($data['message_id']);

		if (isset($data['from']))
			$this->from = new User($data['from']);

		if (isset($data['date']))
			$this->date = intval($data['date']);

		if (isset($data['chat']))
			$this->chat = isset($data['chat']['title']) ? new GroupChat($data['chat']) : new User($data['chat']);

		if (isset($data['forward_from']))
			$this->forward_from = new User($data['forward_from']);

		if (isset($data['forward_date']))
			$this->forward_date = intval($data['forward_date']);

		if (isset($data['reply_to_message']))
			$this->reply_to_message = new Message($data['reply_to_message']);

		if (isset($data['text']))
			$this->text = $data['text'];

		if (isset($data['audio']))
			$this->audio = new Audio($data['audio']);

		if (isset($data['document']))
			$this->document = new Document($data['document']);

		if (isset($data['photo']))
			$this->photo = new ArrayOfPhotoSize($data['photo']);

		if (isset($data['sticker']))
			$this->sticker = new Sticker($data['sticker']);

		if (isset($data['video']))
			$this->video = new Video($data['text']);

		if (isset($data['contact']))
			$this->contact = new Contact($data['contact']);

		if (isset($data['location']))
			$this->location = new Location($data['location']);

		if (isset($data['new_chat_participant']))
			$this->new_chat_participant = new User($data['new_chat_participant']);

		if (isset($data['left_chat_participant']))
			$this->left_chat_participant = new User($data['left_chat_participant']);

		if (isset($data['new_chat_title']))
			$this->new_chat_title = $data['new_chat_title'];

		if (isset($data['new_chat_photo']))
			$this->new_chat_photo = new ArrayOfPhotoSize($data['new_chat_photo']);

		if (isset($data['delete_chat_photo']))
			$this->delete_chat_photo = boolval($data['delete_chat_photo']);

		if (isset($data['group_chat_created']))
			$this->group_chat_created = boolval($data['group_chat_created']);
	}

	/**
	 * @return bool
	 */
	public function isInGroupChat()
	{
		return $this->chat instanceof GroupChat;
	}
}