<?php

namespace Merqueo\Logs\Facades;

use Merqueo\Logs\Log;
use Illuminate\Support\Facades\Facade;
use Merqueo\Logs\FileLogger as LogsFileLogger;

class FileLogger extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new Log(new LogsFileLogger);
    }
}
