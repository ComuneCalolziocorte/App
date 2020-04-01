<?php
require_once (dirname(__FILE__) . '/config.php');
require_once (dirname(__FILE__) . '/FacebookBot.php');
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$input = jason_decode(file_get_contents('php://input'),true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message = strlower($message);
$url="https://graph.facebook.com/v6.0/me/messages?access_token=<PAGE_ACCESS_TOKEN>"
$ch=curl_init($url);

$jsonData='{
	"recipient":{
   	"id":"'.$sender.'"
 	},
  	"messaging_type": "RESPONSE",
  	"message":{
    		"text": "Pick a color:",
    		"quick_replies":[
			 {
			"content_type":"text",
			"title":"Red",
			"payload":"<POSTBACK_PAYLOAD>",
			
		      	},{
			"content_type":"text",
			"title":"Green",
			"payload":"<POSTBACK_PAYLOAD>",
			}
    		]
  		}
};

//encode array
$jasonDataEncoded = $jsonData;
//tell cURL that we want to send a POST request
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jasonDataEncoded);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	
if(!empty($input['entry'][0]['messagging'][0]['message'])){
	$result =curl_exec($ch);
}	

?>


