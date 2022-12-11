<?php

namespace App\Command;

use App\Websocket\MessageHandler;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: "run:websocket-server",
    description: 'run websocket server',
)]
class WebsocketServerCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $port = 3001;
        $output->writeln("Starting server on port " . $port);
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new MessageHandler(),
                ),
            ),
            $port
        );
        $server->run();
        return 0;
    }
}
