## Instalace

1. Pridat do composer json:

```json
        {
            "type": "vcs",
            "url": "https://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@github.com/Limetis/laravel-db-log.git"
        }
```

2. Instalace pomoci composer
```bash
     composer require limetis/laraveldblogger:^0.1.1 
```

3. Publikovat migraci

```bash
     php artisan vendor:publish --tag=migrations
```

4. pustit migraci
```bash
     php artisan migrate
```

5. Nastavit log channel v config/logging.php
```php
          'maria-db-log' => [
             'driver' => 'custom',
             'handler' => \Limetis\laraveldblogger\Handlers\MariaDbLoggingHandler::class,
             'via' => \Limetis\laraveldblogger\Loggers\MariaDbLogger::class,
             'level' => 'debug',
          ],
```

## Pouziti

Kdekoliv v kodu pridat radek: 

```php
    Log::channel('maria-db-log')->info('{message}', ['payload' => ['test' => 'test'], 'requestId' => 'UUID']);
```

