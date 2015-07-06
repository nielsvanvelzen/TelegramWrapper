<?php
namespace Telegram\Types;

class User
{
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $first_name;

	/**
	 * @var string
	 */
	public $last_name;

	/**
	 * @var string
	 */
	public $username;

	public function __construct($data)
	{
		if (isset($data['id']))
			$this->id = intval($data['id']);

		if (isset($data['first_name']))
			$this->first_name = $data['first_name'];

		if (isset($data['last_name']))
			$this->last_name = $data['last_name'];

		if (isset($data['username']))
			$this->username = $data['username'];
	}
}