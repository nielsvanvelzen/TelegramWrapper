<?php
namespace Telegram\Types;

use CURLFile;

class InputFile
{
	/**
	 * @var string
	 */
	private $data;

	/**
	 * @var string|null
	 */
	private $mimeType;

	public function __construct($data, $mimeType = null)
	{
		$this->data = $data;
		$this->mimeType = $mimeType;
	}

	/**
	 * @param string $filename
	 *
	 * @return InputFile
	 */
	public static function fromFile($filename)
	{
		return new InputFile(file_get_contents($filename));
	}

	/**
	 * @return string
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param string $data
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	 * @return string
	 */
	public function getMimeType()
	{
		return $this->mimeType;
	}

	/**
	 * @param string $mimeType
	 */
	public function setMimeType($mimeType)
	{
		$this->mimeType = $mimeType;
	}

	/**
	 * @return CURLFile
	 */
	public function getCURLFile()
	{
		if ($this->mimeType == null) {
			$finfo = new \finfo(FILEINFO_MIME_TYPE);
			$this->mimeType = $finfo->buffer($this->data);
		}

		$path = tempnam(sys_get_temp_dir(), 'TELEGRAM') . '.' . str_replace('/', '.', $this->mimeType); //todo fix nasty mimetype -> ext converter
		file_put_contents($path, $this->data);

		return curl_file_create($path, $this->mimeType);
	}
}