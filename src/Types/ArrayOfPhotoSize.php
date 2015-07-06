<?php
namespace Telegram\Types;

class ArrayOfPhotoSize
{
	/**
	 * @var PhotoSize[]
	 */
	public $photo;

	public function __construct($data)
	{
		$this->photo = [];

		foreach ($data as $photo) {
			$this->photo[] = new PhotoSize($photo);
		}
	}
}