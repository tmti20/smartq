<?php
require_once __DIR__ . '/vendor/autoload.php';
require("login.php");
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('rpc_queue', false, false, false, false);

echo " [x] Awaiting RPC requests\n";
$callback = function ($req) {
    $n = $req->body;
    echo ' Recieved : ', $n, "\n";
    $myvar=auth($n,"b");
// This is where we change the message
    $msg = new AMQPMessage($myvar ,array('correlation_id' => $req->get('correlation_id')));

    $req->delivery_info['channel']->basic_publish(
        $msg,
        '',
        $req->get('reply_to')
    );
    $req->delivery_info['channel']->basic_ack(
        $req->delivery_info['delivery_tag']
    );
};

$channel->basic_qos(null, 1, null);
$channel->basic_consume('rpc_queue', '', false, false, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();
?>
