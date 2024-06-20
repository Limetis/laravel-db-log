## Instalace

1. Pridat repository do composer.json (type.vcs)

2. Instalace pomoci composer

```bash
     composer require limetis/laraveldblogger:^0.0.14 
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
             'via' => \Limetis\laraveldblogger\Handlers\MariaDbLogger::class,
             'level' => 'debug',
          ],
```

## Pouziti

Kdekoliv v kodu pridat radek: 

```php
    Log::channel('maria-db-log')->info('{message}', ['payload' => ['test' => 'test'], 'requestId' => 'UUID']);
```

