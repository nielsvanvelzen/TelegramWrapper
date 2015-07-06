<?php
namespace Telegram;

use Telegram\Types\InputFile;
use Telegram\Types\Message;
use Telegram\Types\Update;
use Telegram\Types\User;
use Telegram\Types\UserProfilePhotos;

class Api
{
	private $apiUrl = 'https://api.telegram.org/bot';
	private $ch;

	private $token;

	/**
	 * @param string $token
	 */
	public function __construct($token)
	{
		$this->token = $token;
		$this->ch = curl_init();
	}

	private function request($method, $arguments = [])
	{
		curl_setopt($this->ch, CURLOPT_URL, $this->apiUrl . $this->token . '/' . $method);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);

		if (!empty($arguments)) {
			foreach ($arguments as $key => &$argument)
				if ($argument instanceof InputFile)
					$argument = $argument->getCURLFile();

			curl_setopt($this->ch, CURLOPT_POST, true);
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $arguments);
		}

		$content = curl_exec($this->ch);

		$json = json_decode($content, true);

		if (!isset($json['ok']) || $json['ok'] == false)
			return [];

		return $json['result'];
	}

	/**
	 * @return User
	 */
	public function getMe()
	{
		return new User($this->request('getMe'));
	}

	/**
	 * @param int $chat_id
	 * @param string $text
	 * @param bool $disable_web_page_preview
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendMessage($chat_id, $text, $disable_web_page_preview = null, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendMessage', [
			'chat_id' => $chat_id,
			'text' => $text,
			'disable_web_page_preview' => $disable_web_page_preview,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param int $from_chat_id
	 * @param int $message_id
	 *
	 * @return Message
	 */
	public function forwardMessage($chat_id, $from_chat_id, $message_id)
	{
		return new Message($this->request('forwardMessage', [
			'chat_id' => $chat_id,
			'from_chat_id' => $from_chat_id,
			'message_id' => $message_id
		]));
	}

	/**
	 * @param int $chat_id
	 * @param string|InputFile $photo
	 * @param null $caption
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendPhoto($chat_id, $photo, $caption = null, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendPhoto', [
			'chat_id' => $chat_id,
			'photo' => $photo,
			'caption' => $caption,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param string|InputFile $audio
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendAudio($chat_id, $audio, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendAudio', [
			'chat_id' => $chat_id,
			'audio' => $audio,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param string|InputFile $document
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendDocument($chat_id, $document, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendDocument', [
			'chat_id' => $chat_id,
			'document' => $document,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param string|InputFile $sticker
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendSticker($chat_id, $sticker, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendSticker', [
			'chat_id' => $chat_id,
			'sticker' => $sticker,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param string|InputFile $video
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendVideo($chat_id, $video, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendVideo', [
			'chat_id' => $chat_id,
			'video' => $video,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param float $latitude
	 * @param float $longitude
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 *
	 * @return Message
	 */
	public function sendLocation($chat_id, $latitude, $longitude, $reply_to_message_id = null, $reply_markup = null)
	{
		return new Message($this->request('sendLocation', [
			'chat_id' => $chat_id,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]));
	}

	/**
	 * @param int $chat_id
	 * @param string $action
	 */
	public function sendChatAction($chat_id, $action)
	{
		$this->request('sendChatAction', [
			'chat_id' => $chat_id,
			'action' => $action
		]);
	}

	/**
	 * @param int $user_id
	 * @param int $offset
	 * @param int $limit
	 *
	 * @return UserProfilePhotos
	 */
	public function getUserProfilePhotos($user_id, $offset = null, $limit = null)
	{
		return new UserProfilePhotos($this->request('getUserProfilePhotos', [
			'user_id' => $user_id,
			'offset' => $offset,
			'limit' => $limit
		]));
	}

	/**
	 * @param int $offset
	 * @param int $limit
	 * @param int $timeout
	 *
	 * @return Update[]
	 */
	public function getUpdates($offset = null, $limit = null, $timeout = null)
	{
		$data = $this->request('getUpdates', [
			'offset' => $offset,
			'limit' => $limit,
			'timeout' => $timeout
		]);

		$updates = [];

		foreach ($data as $update)
			$updates[] = new Update($update);

		return $updates;
	}

	/**
	 * @param string $url
	 */
	public function setWebhook($url = null)
	{
		$this->request('setWebhook', [
			'url' => $url
		]);
	}
}