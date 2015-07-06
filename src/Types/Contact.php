<?php
namespace Telegram\Types;

class Contact
{
	/**
	 * @var string
	 */
	public $phone_number;

	/**
	 * @var string
	 */
	public $first_name;

	/**
	 * @var string|null
	 */
	public $last_name;

	/**
	 * @var string|null
	 */
	public $user_id;

	public function __construct($data)
	{
		if (isset($data['phone_number']))
			$this->phone_number = $data['phone_number'];

		if (isset($data['first_name']))
			$this->first_name = $data['first_name'];

		if (isset($data['last_name']))
			$this->last_name = $data['last_name'];

		if (isset($data['user_id']))
			$this->user_id = $data['v'];
	}
}