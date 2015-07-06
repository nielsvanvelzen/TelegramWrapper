<?php
namespace Telegram\Types;

class Video
{
	/**
	 * @var string
	 */
	public $file_id;

	/**
	 * @var int
	 */
	public $width;

	/**
	 * @var int
	 */
	public $height;

	/**
	 * @var int
	 */
	public $duration;

	/**
	 * @var PhotoSize
	 */
	public $thumb;

	/**
	 * @var string|null
	 */
	public $mime_type;

	/**
	 * @var int|null
	 */
	public $file_size;

	/**
	 * @var string|null
	 */
	public $caption;

	public function __construct($data)
	{
		if (isset($data['file_id']))
			$this->file_id = $data['file_id'];

		if (isset($data['width']))
			$this->width = intval($data['width']);

		if (isset($data['height']))
			$this->height = intval($data['height']);

		if (isset($data['duration']))
			$this->duration = intval($data['duration']);

		if (isset($data['thumb']))
			$this->thumb = new PhotoSize($data['thumb']);

		if (isset($data['file_size']))
			$this->file_size = intval($data['file_size']);

		if (isset($data['caption']))
			$this->caption = $data['caption'];
	}
}