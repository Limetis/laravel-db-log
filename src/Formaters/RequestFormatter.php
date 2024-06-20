<?php

namespace Limetis\laraveldblogger\Formaters;

use Monolog\Formatter\LineFormatter;

class RequestFormatter
{
    public function __invoke($logger): void
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                "[%datetime%] - %message% | %context% \n"
            ));
        }
    }
}
