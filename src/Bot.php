<?php
namespace Telegram;

use Telegram\Commands\CommandCaller;
use Telegram\Commands\HelpCommand;
use Telegram\Commands\ICommand;
use Telegram\Types\Update;

class Bot
{
	/**
	 * @var Api
	 */
	private $api;

	/**
	 * @var ICommand[]
	 */
	private $commands;

	/**
	 * @var string[]
	 */
	private $aliases;

	/**
	 * @param string $token
	 */
	public function __construct($token)
	{
		$this->api = new Api($token);
		$this->commands = [];
		$this->aliases = [];

		$this->addCommand('help', new HelpCommand());
	}

	/**
	 * @return Api
	 */
	public function getApi()
	{
		return $this->api;
	}


	/**
	 * @param string $name
	 * @param ICommand $command
	 *
	 * @return bool
	 */
	public function addCommand($name, $command)
	{
		if (!$command instanceof ICommand)
			return false;

		$this->commands[$name] = $command;
		return true;
	}

	/**
	 * @param string $name
	 */
	public function removeCommand($name)
	{
		unset($this->commands[$name]);
	}

	/**
	 * @param string $alias
	 * @param string $command
	 */
	public function addAlias($alias, $command)
	{
		$this->aliases[$alias] = $command;
	}

	/**
	 * @return ICommand[]
	 */
	public function getCommands()
	{
		return $this->commands;
	}

	/**
	 * @param bool $useWebhook
	 */
	public function work($useWebhook = false)
	{
		if ($useWebhook) {
			$updates = [];

			$input = file_get_contents('php://input');
			$json = json_decode($input, true);

			if ($json !== null)
				$updates[] = new Update($json);
		} else {
			$updates = $this->api->getUpdates();
		}

		$highestId = -1;

		foreach ($updates as $update) {
			$highestId = $update->update_id;

			if (substr($update->message->text, 0, 1) === '/') {
				$details = explode(' ', substr($update->message->text, 1));
				$command = strtolower(array_shift($details));
				$command = explode('@', @$command)[0];
				$caller = new CommandCaller($this, $update->message);

				if (isset($this->aliases[$command]))
					$command = $this->aliases[$command];

				if (isset($this->commands[$command]))
					$this->commands[$command]->call($command, $details, $caller);
				elseif (isset($this->commands['help']))
					$this->commands['help']->call($command, $details, $caller);
			}
		}

		if ($highestId != -1 && !$useWebhook)
			$this->api->getUpdates($highestId + 1, 1);
	}
}