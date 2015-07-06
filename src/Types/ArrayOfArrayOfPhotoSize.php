<?php
namespace Telegram\Types;

class ArrayOfArrayOfPhotoSize
{
	/**
	 * @var PhotoSize[]
	 */
	public $photos;

	public function __construct($data)
	{
		$this->photos = [];

		foreach ($data as $photos) {
			$this->photos[] = new ArrayOfPhotoSize($photos);
		}
	}
}