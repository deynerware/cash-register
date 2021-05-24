<?php

namespace Merqueo\Logs;

use Merqueo\Contracts\Logger;

class Log
{
    protected static $logger;

    public static function setLogger(Logger $logger)
    {
        self::$logger = $logger;
    }

    public static function getLogger()
    {
        return self::$logger;
    }

    public static function info($message)
    {
        static::$logger->info($message);
    }
}
