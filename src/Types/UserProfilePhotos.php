<?php
namespace Telegram\Types;

class UserProfilePhotos
{
	public $total_count;
	public $photos;

	public function __construct($data){
		if(isset($data['total_count']))
			$this->total_count = $data['total_count'];

		if(isset($data['photos']))
		{
			$this->photos = [];

			foreach($data['photos'] as $apiCollection)
			{
				$collection = [];

				foreach($apiCollection as $photo)
				{
					$collection[] = new PhotoSize($photo);
				}

				$this->photos[] = $collection;
			}
		}
	}
}