<?php

//HAS ALL THE INFO FOR THE SQS CLASSES USED
require_once('sqs.php');
//CREATES A SQS OBJECT WITH ALL ITS PROPERTIES AND METHODS
$sqs = new SQS('AKIAIDB5XKKKACI23TGQ', 'tWeWwsJuk7J45UqQA8UaWdiV3f+tdMvquh5wdUVt');

//sets compound url with all info needed to retrieve messages
$queue = 'https://sqs.us-east-1.amazonaws.com/819829925634/Zolvi_Queue';

//retrieves messages
$messages = $sqs->receiveMessage($queue);
//print_r($messages['Messages'][0]['Body']);

//print_r($messages);
$m = $messages['Messages'][0];
echo "\n";
echo $m['Body'];


$sqs->deleteMessage($queue, $m['ReceiptHandle']);


?>