<?php

namespace SMS;
 
require '../vendor/autoload.php';



use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class sendSMS{
    private $recipient = '237670011942';
    private $content = "Greetings and nice day from ProGuide's team"; 
    public function send(?String $recipient, ?String $content){

        
        isset($content)? $this->content = $content : '';
        isset($recipient)? $this->recipient = $recipient : '';

        

        $client = new Client([
            'base_uri' => "https://6gyzzr.api.infobip.com/",
            'headers' => [
                'Authorization' => "App 6a6a6fb4edd5d58332bf5eb9f38b1465-5a1e0d19-78d7-4323-b4c7-277cb71cdd1c",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);
        
        $response = $client->request(
            'POST',
            'sms/2/text/advanced',
            [
                RequestOptions::JSON => [
                    'messages' => [
                        [
                            'from' => 'ProGuide',
                            'destinations' => [
                                ['to' => $this->recipient]
                            ],
                            'text' => $this->content,
                        ]
                    ]
                ],
            ]
        );
        
        echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
        echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
    }
}


// test case

$sms = new sendSMS();

$sms->send('237670011942', 'Is your day good?');
