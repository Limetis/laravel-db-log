<?php

namespace Limetis\LaravelDBLogger\Handlers;

use App\Data\LogData;
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
        if (isset($record->context['requestId'])) {
            $requestId = $record->context['requestId'];
                $logData = new LogData(
                    $requestId,
                    $record->message,
                    $record->context,
                    $record->context['payload'] ?? [],
                    $record->level->name,
                    $record->channel,
                    $record->extra ?? [],
                    null,
                    null,
                );
                \App\Models\Log::query()->create($logData->toArray());
        } else {
            Log::warning('RequestId is not set in context');
        }
    }
}
