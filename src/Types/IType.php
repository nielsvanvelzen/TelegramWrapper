<?php
namespace Telegram\Types;

abstract class IType
{
	/**
	 * string
	 */
	public function toJSON()
	{
		return '[]';
	}
}