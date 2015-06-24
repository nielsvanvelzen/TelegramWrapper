<?php
namespace Telegram\Api;

class PhotoSize
{
	public $file_id;
	public $width;
	public $height;
	public $file_size;

	public function __construct($data){
		if(isset($data['file_id']))
			$this->file_id = $data['file_id'];

		if(isset($data['width']))
			$this->width = $data['width'];

		if(isset($data['height']))
			$this->height = $data['height'];

		if(isset($data['file_size']))
			$this->file_size = $data['file_size'];
	}
}