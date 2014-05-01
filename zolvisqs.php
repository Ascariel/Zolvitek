<?php
//HAS ALL THE INFO FOR THE SQS CLASSES USED
require_once('sqs.php');
//CREATES A SQS OBJECT WITH ALL ITS PROPERTIES AND METHODS
$sqs = new SQS('AKIAIDB5XKKKACI23TGQ', 'tWeWwsJuk7J45UqQA8UaWdiV3f+tdMvquh5wdUVt');


//RECOVERS VARIABLES TO START REQUEST
//$file = json_encode($_REQUEST['zfile']);
$file = 'Randomized Message: '.rand(1,1000);//$_REQUEST['zfile'];
//$action = $_REQUEST['action'];

//CREATES A QUEUE IN CASE I DONT HAVE ONE ALREADY
$response = $sqs->createQueue('Zolvi_Queue');
$queue = $response['QueueUrl'];
print_r($response);

//SEND MESSAGE REQUEST
$sendMessage = $sqs->sendMessage($queue, $file);

//RETRIEVES MESSAGES FROM QUEUE
$messages = $sqs->receiveMessage($queue);
print_r($messages);

//DELETE MESSAGE FROM QUEUE
$m = $messages['Messages'][0];
print_r($m['Body']);
//print_r($file);


//$sqs->deleteMessage($queue, $m['ReceiptHandle']);
?>