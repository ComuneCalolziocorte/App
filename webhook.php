<?php
require_once (dirname(__FILE__) . '/config.php');
require_once (dirname(__FILE__) . '/FacebookBot.php');
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);



$input = jason_decode(file_get_contents('php://input'),true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message = strlower($message);

if(preg_match('[time[current time|now]', strlower($message))){
	if($input!=''){
		$message_to_reply = $result;
	}else{
		$dat = date('H:i:s');
		$list=array("hi"=>"ciao, piacere di conoscerti clicca \help", 
		"/help"=>"5",
		"contact"=>"2"
		);
		$obj=$list["message"];
		if($obj==""){
			$obj = "digita /help";
		}else{
			$obj=list["message"];
		}
		$url="https://graph.facebook.com/v6.0/me/messages?access_token=EAADbYVnw53sBAPBATKoKghNPhIFFV7eMCtCqHUZA5v9yPBtrGW9dlw5mKd4QBR0zfprL7BvZB6QIayYHWCTEUA6UzZCfqt8ncStotFBjbAJZC4WFZApUaA9qDEgYF35TmjXDX0jDiCc8LzHjF47HnJdMms3WltQs1fhQgfDN4f5q7i7SIVLJL";

		$ch=curl_init($url);
		if($obj==2){
			$jsonData='{
				"recipient":{
					"id":"'.$sender.'"
				},
				"message":{
					"attachement":{
						"type":"template",
							"payload":{
								"template_type":"button",
								"text":"chiamaci",
								"buttons":
								[
									{"type":"phone_number",
									"title:"clicca per chiamare",
									"payload":"+390341639111"
									},
									{"type":"web_url",
									"url":"https://www.google.it",
									"title":"_Address".
									"webview_height_ratio":"compact"
									}
								]
							}
					}
				}
			}';
		}else if ($obj ==5){
			$jsonData='{
				"recipient":{
					"id":"'.$sender.'"
					},
				"message":{
					"text":"bot menu",
					"quick_replies":[
						{"content_type":"text",
						"title":"balance",
						"payload":DEVELOPER_DEDINED_PAYOLAD_FOR_PICKING_RED"
						},
						{"content_type":"text",
						"title":"price",
						"payload":DEVELOPER_DEDINED_PAYOLAD_FOR_PICKING_BLUE"
						},
						{"content_type":"text",
						"title":"contact",
						"payload":DEVELOPER_DEDINED_PAYOLAD_FOR_PICKING_GREEN"
						}
					]
				}
			}';
		
		}else{
			$jsonData='{
				"recipient":{
				"id":"'.$sender.'"
				},
				"message":{
					"text":"'.$obj.'",
				}
			}';
		}
		
	//encode array
	$jasonDataEncoded = $jsonData;
	//tell cURL that we want to send a POST request
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jasonDataEncoded);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	
	if(!empty($input['entry'][0]['messagging'][0]['message'])){
		$result =curl_exec($ch);
	}	
	}
}
	echo "hi";
?>
