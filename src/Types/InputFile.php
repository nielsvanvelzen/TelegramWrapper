<?php
namespace Telegram\Types;

use CURLFile;

class InputFile extends IType
{
	/**
	 * @var string
	 */
	private $file;

	/**
	 * @param string $file
	 */
	public function __construct($file)
	{
		$this->file = $file;
	}

	/**
	 * @return string
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * @param string $file
	 */
	public function setFile($file)
	{
		$this->file = $file;
	}

	/**
	 * @return CURLFile
	 */
	public function getCURLFile()
	{
		return new CURLFile($this->file);
	}
}