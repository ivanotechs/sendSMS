<?php

 
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
            'base_uri' => "http://api.messaging-service.com",
            'headers' => [
                'Authorization' => "App d473cf628c215f716a99a5b6d621f7b6-436fecab-05b5-4dbe-9cb1-62211fff1489",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);
        
        try {
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
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        

    }
}


// test case


