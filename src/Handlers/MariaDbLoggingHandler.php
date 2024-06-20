<?php

namespace Limetis\laraveldblogger\Handlers;

use Illuminate\Support\Facades\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class MariaDbLoggingHandler extends AbstractProcessingHandler
{
    public function __construct($level = Level::Debug, $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        $requestId = $record->context['requestId'] ?? null;
            $logData = [
              'request_id' => $requestId,
              'message' => $record->message,
              //'payload' => context['payload'] ?? [],
              'level' => $record->level->name,
              'channel' => $record->channel,
              'extra' => $record->extra ?? [],
            ];
            \Limetis\laraveldblogger\Models\Log::query()->create($logData);
    }
}
