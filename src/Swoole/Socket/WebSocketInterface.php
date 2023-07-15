<?php

namespace Laravel\Octane\Swoole\Socket;

use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

interface WebSocketInterface
{
    /**
     * The function is executed when a new WebSocket connection is established and passed the handshake stage.
     * @see https://www.swoole.co.uk/docs/modules/swoole-websocket-server-on-open
     * @param Request $request
     * @return void
     */
    public function onOpen(Request $request);

    /**
     * The function is executed when a new data Frame is received by the WebSocket Server. The logics of processing the request from the WebSocket client should be defined within this function.
     * @see https://www.swoole.co.uk/docs/modules/swoole-websocket-server-on-message
     * @param Frame $frame
     * @return void
     */
    public function onMessage(Frame $frame);

    /**
     * The function is executed when a new WebSocket connection is closed.
     * @see https://www.swoole.co.uk/docs/modules/swoole-websocket-server-on-close
     * @param $fd
     * @param $reactorId
     * @return void
     */
    public function onClose(int $fd, int $reactorId);
}
