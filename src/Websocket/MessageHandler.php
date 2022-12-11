<?php

namespace App\Websocket;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class MessageHandler implements MessageComponentInterface
{
    public function __construct(
        protected readonly \SplObjectStorage $connections = new \SplObjectStorage,
    )
    {

    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->connections->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        foreach ($this->connections as $connection) {
            if ($connection === $from) {
                continue;
            }
            $connection->send($msg);
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->connections->detach($conn);
    }

    public function onError(ConnectionInterface $conn, Exception $e)
    {
        $this->connections->detach($conn);
        $conn->close();
    }
}
