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
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode([
			'keyboard' => $this->keyboard,
			'resize_keyboard' => $this->resize_keyboard,
			'one_tme_keyboard' => $this->one_time_keyboard,
			'selective' => $this->selective
		]);
	}
}