# PHP Telegram Wrapper

[![Latest Version](https://img.shields.io/packagist/v/hetisniels/telegram-wrapper.svg?style=flat)](https://packagist.org/packages/hetisniels/telegram-wrapper)
[![Total Downloads](https://img.shields.io/packagist/dt/hetisniels/telegram-wrapper.svg?style=flat)](https://packagist.org/packages/hetisniels/telegram-wrapper)

PHP wrapper for Telegram bots

## Install

This project uses Composer. To use the project, just add it to your dependencies.

``` bash
$ composer require hetisniels/telegram-wrapper
```
**Without Composer**

It is possible you dont like Composer or you just want to get the source and use it. In this case download the latest release in releases page.
Note: You need to make your own autoloader for this to work!

## Sample usage
### Telegram\Bot
``` php
<?php
class HelloWorldCommand implements \Telegram\Commands\ICommand
{
	public function call($name, $arguments, $caller)
	{
		$keyboard = new KeyboardBuilder();
		$keyboard = $keyboard->button('A')->button('B')->row()->button('C')->button('D')->row()->setResizable(true)->setOneTime(true)->keyboard();
		
		$caller->reply('Hello World!', false, $keyboard);
	}
	
	public function getDescription()
	{
		return 'Sends the popular "Hello World" text.';
	}
	
	public function getUsage()
	{
		return '<command>';
	}
}

$bot = new Telegram\Bot('API_TOKEN');
$bot->addCommand('helloworld', new HelloWorldCommand());
$bot->work();
```
And now, just send te message "/helloworld" to the bot!
![KeyboardBuilder result](http://ndat.nl/f1436874735.png)

### Telegram\Api
``` php
<?php
$bot = new Telegram\Api('API_TOKEN');

$bot->getUpdates(); // Returns array of Update
```
An custom command handler is needed when using the API.
The API provides only the methods & types from Telegram.
