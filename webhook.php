<?php
require_once (dirname(__FILE__) . '/config.php');
require_once (dirname(__FILE__) . '/FacebookBot.php');
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();

curl -X POST -H "Content-Type: application/json" -d '{
  "recipient":{
    "id":"<PSID>"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Pick a color:",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Red",
        "payload":"<POSTBACK_PAYLOAD>"
      },{
        "content_type":"text",
        "title":"Green",
        "payload":"<POSTBACK_PAYLOAD>"
      }
    ]
  }
}' "https://graph.facebook.com/v6.0/me/messages?access_token=<PAGE_ACCESS_TOKEN>"  





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
