<?php

$config = $serverState['octaneConfig'];

try {
    $enableWebSocket = $config['websocket']['enable'];

    $serverClass = $enableWebSocket ? Swoole\Websocket\Server::class : Swoole\Http\Server::class;

    $server = new $serverClass(
        $serverState['host'] ?? '127.0.0.1',
        $serverState['port'] ?? 8080,
        $serverState['mode'] ?? SWOOLE_PROCESS,
        ($config['swoole']['ssl'] ?? false)
            ? SWOOLE_SOCK_TCP | SWOOLE_SSL
            : SWOOLE_SOCK_TCP,
    );
} catch (Throwable $e) {
    Laravel\Octane\Stream::shutdown($e);

    exit(1);
}

$server->set(array_merge(
    $serverState['defaultServerOptions'],
    $config['swoole']['options'] ?? []
));

return $server;
