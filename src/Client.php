<?php
namespace Telegram;

use Telegram\Types\Update;
use Telegram\Types\User;
use Telegram\Types\UserProfilePhotos;

class Client{
	private $apiUrl = 'https://api.telegram.org/bot';
	private $token;

	/**
	 * @param string $token
	 */
	public function __construct($token){
		$this->token = $token;
	}

	/**
	 * @param string $method
	 * @param array | null $arguments
	 *
	 * @return array
	 */
	public function api($method, $arguments = [])
	{
		$url = $this->apiUrl . $this->token . '/' . $method . '?' . http_build_query($arguments);
		$content = file_get_contents($url);
		$json = json_decode($content, true);

		if(!isset($json['ok']) || $json['ok'] == false)
			return [];

		return $json['result'];
	}

	/**
	 * @return User
	 */
	public function getMe()
	{
		return new User($this->api('getMe'));
	}

	/**
	 * @param int $chat_id
	 * @param string $text
	 * @param bool $disable_web_page_preview
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendMessage($chat_id, $text, $disable_web_page_preview = null, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param int $from_chat_id
	 * @param int $message_id
	 */
	public function forwardMessage($chat_id, $from_chat_id, $message_id){
		
	}

	/**
	 * @param int $chat_id
	 * @param $photo
	 * @param null $caption
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendPhoto($chat_id, $photo, $caption = null, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param $audio
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendAudio($chat_id, $audio, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param $document
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendDocument($chat_id, $document, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param $sticker
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendSticker($chat_id, $sticker, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param $video
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendVideo($chat_id, $video, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param float $latitude
	 * @param float $longitude
	 * @param int $reply_to_message_id
	 * @param null $reply_markup
	 */
	public function sendLocation($chat_id, $latitude, $longitude, $reply_to_message_id = null, $reply_markup = null){
		
	}

	/**
	 * @param int $chat_id
	 * @param string $action
	 */
	public function sendChatAction($chat_id, $action){
		$this->api('sendChatAction', [
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
		return new UserProfilePhotos($this->api('getUserProfilePhotos', [
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
	public function getUpdates($offset = null, $limit = null, $timeout = null){
		$data = $this->api('getUpdates', [
			'offset' => $offset,
			'limit' => $limit,
			'timeout' => $timeout
		]);

		$updates = [];

		foreach($data as $update)
			$updates[] = new Update($update);

		return $updates;
	}

	/**
	 * @param string $url
	 */
	public function setWebhook($url = null){
		$this->api('setWebhook', [
			'url' => $url
		]);
	}
}