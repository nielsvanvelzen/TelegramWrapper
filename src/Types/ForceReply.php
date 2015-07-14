<?php
namespace Telegram\Types;

class ForceReply{
	/**
	 * @var true
	 */
	public $force_reply;

	/**
	 * @var bool
	 */
	public $selective;

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