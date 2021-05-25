<?php

namespace Merqueo\Logs;

use Merqueo\Contracts\Logger;

class Log
{
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function info($message)
    {
        $this->logger->info($message);
    }
}
