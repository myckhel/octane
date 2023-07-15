<?php

namespace Laravel\Octane\Swoole\Socket;

use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * @see https://www.swoole.co.uk/docs/modules/swoole-websocket-server
 */
class WebSocketService implements WebSocketInterface
{
    public function __construct(public Server $server)
    {
    }

    public function onOpen(Request $request)
    {
        $this->server->push($request->fd, 'Welcome to Laravel Octane WS');
    }

    public function onMessage(Frame $frame)
    {
        $this->server->push($frame->fd, date('Y-m-d H:i:s'));
    }

    public function onClose($fd, $reactorId)
    {
        echo 'Socket closed id:' . $fd . ' reactorId:' . $reactorId;
    }
}
