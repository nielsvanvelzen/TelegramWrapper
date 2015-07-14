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