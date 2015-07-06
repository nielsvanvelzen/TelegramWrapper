<?php
namespace Telegram\Types;

class Location
{
	/**
	 * @var float
	 */
	public $longitude;

	/**
	 * @var float
	 */
	public $latitude;

	public function __construct($data)
	{
		if (isset($data['longitude']))
			$this->longitude = floatval($data['longitude']);

		if (isset($data['latitude']))
			$this->latitude = floatval($data['latitude']);
	}
}