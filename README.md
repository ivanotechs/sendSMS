# sendSMS
PHP code to send messages to your application end user

Functioning of the package

1. Clone repository and do composer install to install packages
2. To integrate to an existing project, copy the folder SMS to your project and do composer require infobip/infobip-api-php-client
3. Create an infobip account and copy your API key to the project
4. Create and instance of the sendSMS class and call the public method send(String $recipient, String $content) to send a message
