<?php

namespace Merqueo\Logs;

use Merqueo\Contracts\Logger;

class FileLogger implements Logger
{
    public function info($message)
    {
        file_put_contents(
            __DIR__. '/../../storage/logs/cash_register_log.txt',
            '('.date('Y-m-d H:i:s').') '.$message."\n",
            FILE_APPEND
        );
    }
}
