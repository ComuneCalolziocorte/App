<?php
require_once (dirname(__FILE__) . '/config.php');
require_once (dirname(__FILE__) . '/FacebookBot.php');
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();

foreach ($messages as $message)
{
	$recipientId = $message->senderId;
	if($message->text)
	{
		$response = processRequest($message->text);
		$bot->sendTextMessage($recipientId, $response);
	}
}




function processRequest($text)
{
	$text = trim($text);
	$text = strtolower($text);
	$response = "";
	if($text=="uffici")
	{
		$response = "uffici e orari";
	}
	elseif ($text=="domanda 2")
	{
		$response = "risposta alla domanda 2";
	}
	else
	{
		$response = "Non capisco la domanda";
	}
	return $response;
}
