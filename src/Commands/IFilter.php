<?php
namespace Telegram\Commands;

interface IFilter
{
	/**
	 * @param string $message
	 * @param CommandCaller $caller
	 *
	 * @return bool
	 */
	public function filter($message, $caller);
}