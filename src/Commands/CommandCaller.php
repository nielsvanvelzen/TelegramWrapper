<?php
namespace Telegram\Commands;

use Telegram\Bot;
use Telegram\Types\GroupChat;
use Telegram\Types\Message;
use Telegram\Types\PhotoSize;
use Telegram\Types\User;

class CommandCaller
{
	/**
	 * @var Bot
	 */
	private $bot;

	/**
	 * @var Message
	 */
	private $message;

	/**
	 * @var User
	 */
	private $sender;

	/**
	 * @var User|GroupChat
	 */
	private $chat;

	/**
	 * @param Bot $bot
	 * @param Message $message
	 */
	public function __construct($bot, $message)
	{
		$this->bot = $bot;
		$this->message = $message;

		$this->sender = $message->from;
		$this->chat = $message->chat;
	}

	/**
	 * @return Bot
	 */
	public function getBot()
	{
		return $this->bot;
	}

	/**
	 * @return Message
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @return User
	 */
	public function getSender()
	{
		return $this->sender;
	}

	/**
	 * @return GroupChat|User
	 */
	public function getChat()
	{
		return $this->chat;
	}

	/**
	 * @param string $message
	 * @param bool $forwarded
	 */
	public function reply($message, $forwarded = false)
	{
		$this->bot->getApi()->sendMessage($this->chat->id, $message, null, ($forwarded ? $this->message->message_id : null), null);
	}
}