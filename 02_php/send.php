<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.1.103', 5672, 'test', 'test');
$channel = $connection->channel();

$channel->queue_declare('hi', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hi');

echo " [x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();
?>
