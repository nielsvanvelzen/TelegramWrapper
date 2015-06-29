# PHP Telegram Bot
PHP wrapper for Telegram bots

## WORK IN PROGRESS
Wrapper may not work as expected. Issues may be reported to the issue tracker.

## Sample usage
### Telegram\Bot
``` php
<?php
class KittenCommand implements \Telegram\Commands\ICommand
{
	public function call($name, $arguments, $caller)
	{
		$caller->reply('[insert picture of cat here]');
	}
	
	public function getDescription()
	{
		return 'Sends this funny message instead of a picture';
	}
}

$bot = new Telegram\Bot('API_TOKEN');
$bot->addCommand('kitten', new KittenCommand()); // Adds the command "kitten"

$bot->work(false); // Let the bot work, use getUpdates via API instead of webhook
```
### Telegram\Api
``` php
<?php
$bot = new Telegram\Api('API_TOKEN');

$bot->getUpdates(); // Returns array of Update
```