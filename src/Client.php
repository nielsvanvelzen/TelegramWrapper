<?php
namespace Telegram;

use Telegram\Api\User;
use Telegram\Api\UserProfilePhotos;

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
	private function api($method, $arguments = [])
	{
		$url = $this->apiUrl . $this->token . '/' . $method . '?' . http_build_query($arguments);
		$content = file_get_contents($url);
		$json = json_decode($content, true);

		if(!isset($json['ok']) || $json['ok'] == false)
			throw new \Exception('Invalid response. ');

		return $json['result'];
	}

	/**
	 * @return User
	 */
	public function getMe()
	{
		return new User($this->api('getMe'));
	}

	public function getUserProfilePhotos($user_id, $offset = null, $limit = null)
	{
		return new UserProfilePhotos($this->api('getUserProfilePhotos', ['user_id' => $user_id, 'offset' => $offset, 'limit' => $limit]));
	}
}