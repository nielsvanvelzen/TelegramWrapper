<?php
namespace Telegram\Types;

class ForceReply extends IType{
	/**
	 * @var true
	 */
	public $force_reply;

	/**
	 * @var bool
	 */
	public $selective;

	/**
	 * @param bool $force_reply
	 * @param bool $selective
	 */
	public function __construct($force_reply = true, $selective = false){
		$this->force_reply = $force_reply;
		$this->selective = $selective;
	}

	/**
	 * @return string
	 */
	public function toJSON(){
		return json_encode([
			'force_reply' => $this->force_reply,
			'selective' => $this->selective
		]);
	}
}