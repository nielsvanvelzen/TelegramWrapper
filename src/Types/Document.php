<?php
namespace Telegram\Types;

class Document
{
	/**
	 * @var string
	 */
	public $file_id;

	/**
	 * @var PhotoSize
	 */
	public $thumb;

	/**
	 * @var string|null
	 */
	public $file_name;

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

		if (isset($data['thumb']))
			$this->thumb = new PhotoSize($data['thumb']);

		if (isset($data['file_name']))
			$this->file_name = $data['file_name'];

		if (isset($data['mime_type']))
			$this->mime_type = $data['mime_type'];

		if (isset($data['file_size']))
			$this->file_size = intval($data['file_size']);
	}
}