<?php

namespace Limetis\LaravelDBLogger\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class LogData extends Data
{
    public function __construct(
        public string $event,
        public string $eventId,
        public string $eshopId,
        public string $requestId,
        public string $message,
        public ?array $payload,
        public string $level,
        public string $channel,
        public ?array $extra,
        public ?string $remoteAddr,
        public ?string $userAgent,
    ) {
    }
}
