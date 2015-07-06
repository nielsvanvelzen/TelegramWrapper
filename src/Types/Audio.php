<?php
namespace Telegram\Types;

class Audio
{
	/**
	 * @var string
	 */
	public $file_id;

	/**
	 * @var int|null
	 */
	public $duration;

	/**
	 * @var string|null
	 */
	public $mime_type;

	/**
	 * @var int|null
	 */
	public $file_size;

	public function __construct($data)
	{
		if (isset($data['file_id']))
			$this->file_id = $data['file_id'];

		if (isset($data['duration']))
			$this->duration = intval($data['duration']);

		if (isset($data['mime_type']))
			$this->mime_type = $data['mime_type'];

		if (isset($data['file_size']))
			$this->file_size = intval($data['file_size']);
	}
}