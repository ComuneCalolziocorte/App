<?php
require_once (dirname(__FILE__) . '/config.php');
require_once (dirname(__FILE__) . '/FacebookBot.php');

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
        "payload":"<POSTBACK_PAYLOAD>",
        "image_url":"http://example.com/img/red.png"
      },{
        "content_type":"text",
        "title":"Green",
        "payload":"<POSTBACK_PAYLOAD>",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }
}' "https://graph.facebook.com/v6.0/me/messages?access_token="EAADbYVnw53sBAPBATKoKghNPhIFFV7eMCtCqHUZA5v9yPBtrGW9dlw5mKd4QBR0zfprL7BvZB6QIayYHWCTEUA6UzZCfqt8ncStotFBjbAJZC4WFZApUaA9qDEgYF35TmjXDX0jDiCc8LzHjF47HnJdMms3WltQs1fhQgfDN4f5q7i7SIVLJL";	

?>

