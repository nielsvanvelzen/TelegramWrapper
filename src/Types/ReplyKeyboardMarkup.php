<?php
namespace Telegram\Types;

class ReplyKeyboardMarkup extends IType
{
	/**
	 * @var string[][]
	 */
	public $keyboard;

	/**
	 * @var bool
	 */
	public $resize_keyboard;

	/**
	 * @var bool
	 */
	public $one_time_keyboard;

	/**
	 * @var bool
	 */
	public $selective;

	/**
	 * @param string[][] $keyboard
	 * @param bool $resize_keyboard
	 * @param bool $one_time_keyboard
	 * @param bool $selective
	 */
	public function __construct($keyboard, $resize_keyboard = false, $one_time_keyboard = false, $selective = false)
	{
		$this->keyboard = $keyboard;
		$this->resize_keyboard = $resize_keyboard;
		$this->one_time_keyboard = $one_time_keyboard;
		$this->selective = $selective;
	}

	/**
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode([
			'keyboard' => $this->keyboard,
			'resize_keyboard' => $this->resize_keyboard,
			'one_time_keyboard' => $this->one_time_keyboard,
			'selective' => $this->selective
		]);
	}
}
