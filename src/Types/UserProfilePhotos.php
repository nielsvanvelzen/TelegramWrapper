<?php
namespace Telegram\Types;

class UserProfilePhotos
{
	/**
	 * @var int
	 */
	public $total_count;

	/**
	 * @var ArrayOfArrayOfPhotoSize
	 */
	public $photos;

	public function __construct($data)
	{
		if (isset($data['total_count']))
			$this->total_count = $data['total_count'];

		if (isset($data['photos']))
			$this->photos = new ArrayOfArrayOfPhotoSize($data['photos']);
	}
}