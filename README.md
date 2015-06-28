# PHP Telegram Bot
PHP wrapper for Telegram bots

**WORK IN PROGRESS**
Wrapper may not work as expected. Issues may be reported to the issue tracker.

## Usage

``` php
$bot = new Telegram\Client('API_TOKEN');

$bot->getUpdates(); // Returns array of Update
```