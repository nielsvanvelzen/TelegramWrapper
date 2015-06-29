<?php
namespace Telegram\Commands;

interface ICommand
{
	/**
	 * @param string $name
	 * @param mixed[] $arguments
	 * @param CommandCaller $caller
	 */
	public function call($name, $arguments, $caller);

	/**
	 * @return string
	 */
	public function getDescription();
}