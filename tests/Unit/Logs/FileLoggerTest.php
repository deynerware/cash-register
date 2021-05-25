<?php

namespace Tests\Unit\Logs;

use Merqueo\Logs\FileLogger;
use Merqueo\Logs\Log;
use PHPUnit\Framework\TestCase;

class FileLoggerTest extends TestCase
{
    /** @test */
    public function can_register_a_log_into_file_log()
    {
        $file = __DIR__. '/../../../storage/logs/cash_register_log.txt';
        @unlink($file);

        Log::setLogger(new FileLogger);

        Log::info('this is a test');

        $content = file_get_contents($file);

        $this->assertStringContainsString('this is a test', $content);
    }

    /** @test */
    public function can_instantiate_an_object()
    {
        $log = Log::setLogger(new FileLogger);
        $filelogger = Log::getLogger();

        $this->assertInstanceOf(FileLogger::class, $filelogger);
    }


}
