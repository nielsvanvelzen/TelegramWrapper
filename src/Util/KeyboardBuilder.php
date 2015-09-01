<?php
namespace Telegram\Util;

use Telegram\Types\IType;
use Telegram\Types\ReplyKeyboardMarkup;

class KeyboardBuilder extends IType
{
	/**
	 * @var string[][]
	 */
	private $buttons = [];

	/**
	 * @var string[]
	 */
	private $row = [];

	/**
	 * @var bool
	 */
	private $resize_keyboard = true;

	/**
	 * @var bool
	 */
	private $one_time_keyboard = true;

	/**
	 * @var bool
	 */
	private $selective = false;

	/**
	 * @return KeyboardBuilder
	 */
	public function reset()
	{
		$this->row = [];
		$this->buttons = [];

		return $this;
	}

	/**
	 * @param string $text
	 *
	 * @return KeyboardBuilder
	 */
	public function button($text)
	{
		$this->row[] = $text;

		return $this;
	}

	/**
	 * @return KeyboardBuilder
	 */
	public function row()
	{
		$this->buttons[] = $this->row;
		$this->row = [];

		return $this;
	}

	/**
	 * @param bool $resize_keyboard
	 *
	 * @return KeyboardBuilder
	 */
	public function setResizable($resize_keyboard)
	{
		$this->resize_keyboard = boolval($resize_keyboard);

		return $this;
	}

	/**
	 * @param bool $one_time_keyboard
	 *
	 * @return KeyboardBuilder
	 */
	public function setOneTime($one_time_keyboard)
	{
		$this->one_time_keyboard = boolval($one_time_keyboard);

		return $this;
	}

	/**
	 * @param bool $selective
	 *
	 * @return KeyboardBuilder
	 */
	public function setSelective($selective)
	{
		$this->selective = boolval($selective);

		return $this;
	}

	/**
	 * @return ReplyKeyboardMarkup
	 */
	public function keyboard()
	{
		return new ReplyKeyboardMarkup($this->buttons, $this->resize_keyboard, $this->one_time_keyboard, $this->selective);
	}

	/**
	 * @return string
	 */
	public function toJSON(){
		return $this->keyboard()->toJSON();
	}
}