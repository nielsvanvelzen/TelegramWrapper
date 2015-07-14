<?php
namespace Telegram\Types;

class ReplyKeyboardHide extends IType
{
	/**
	 * @var true
	 */
	public $hide_keyboard;

	/**
	 * @var bool
	 */
	public $selective;

	/**
	 * @param bool $hide_keyboard
	 * @param bool $selective
	 */
	public function __construct($hide_keyboard = true, $selective = false)
	{
		$this->hide_keyboard = $hide_keyboard;
		$this->selective = $selective;
	}

	/**
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode([
			'hide_keyboard' => $this->hide_keyboard,
			'selective' => $this->selective
		]);
	}
}