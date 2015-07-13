<?php
namespace Telegram\Commands;

class HelpCommand implements ICommand
{
	/**
	 * @param string $name
	 * @param mixed[] $arguments
	 * @param CommandCaller $caller
	 */
	public function call($name, $arguments, $caller)
	{
		$response = '';
		$asReply = true;
		$commands = $caller->getBot()->getCommands();

		if ($name == 'help' && isset($arguments[0])) {
			if (strtolower($arguments[0]) == 'botfather') {
				$asReply = false;

				foreach ($commands as $name => $handler) {
					$response .= sprintf('%s - %s' . PHP_EOL, $name, $handler->getDescription());
				}
			} else if (isset($commands[strtolower($arguments[0])])) {
				$response .= '/' . $arguments[0] . PHP_EOL . PHP_EOL;
				$response .= $commands[strtolower($arguments[0])]->getDescription();
			} else {
				$response .= 'Commands matching "' . $arguments[0] . '"' . PHP_EOL . PHP_EOL;

				$matches = 0;
				foreach ($commands as $name => $handler) {
					if (strpos($name, $arguments[0]) !== false) {
						$matches++;

						$response .= sprintf('/%s - %s' . PHP_EOL, str_replace('<command>', $name, $handler->getUsage()), $handler->getDescription());
					}
				}

				if ($matches == 0)
					$response = 'No commands found matching "' . $arguments[0] . '".';
			}
		} else {
			if ($name != 'help' && $name != 'start')
				$response .= 'Command "' . $name . '"" was not found.' . PHP_EOL . PHP_EOL;

			$response .= 'This bot uses the following commands: ' . PHP_EOL . PHP_EOL;

			foreach ($commands as $name => $handler) {
				$response .= sprintf('/%s - %s' . PHP_EOL, str_replace('<command>', $name, $handler->getUsage()), $handler->getDescription());
			}
		}

		$caller->reply($response, $asReply);
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return 'Returns list of bot commands';
	}

	/**
	 * @return string
	 */
	public function getUsage()
	{
		return '<command> [query]';
	}
}