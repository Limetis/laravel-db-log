<?php

namespace Limetis\laraveldblogger\Loggers;

use Limetis\laraveldblogger\Handlers\MariaDbLoggingHandler;
use Monolog\Logger;

class MariaDbLogger
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('MariaDbLoggingHandler');

        return $logger->pushHandler(new MariaDbLoggingHandler());
    }
}
