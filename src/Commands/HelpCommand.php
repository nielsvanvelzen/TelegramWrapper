<?php
namespace Telegram\Commands;

class HelpCommand implements ICommand{
	/**
	 * @param string $name
	 * @param mixed[] $arguments
	 * @param CommandCaller $caller
	 */
	public function call($name, $arguments, $caller)
	{
		$response = '';

		if($name != 'help')
			$response = 'Command ' . $name . ' was not found.' . PHP_EOL . PHP_EOL;

		$response .= 'This bot uses the following commands: ' . PHP_EOL . PHP_EOL;

		foreach($caller->getBot()->getCommands() as $name => $handler)
		{
			$response .= sprintf('/%s - %s' . PHP_EOL, $name, $handler->getDescription());
		}

		$caller->reply($response, true);
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return 'Returns list of bot commands';
	}
}