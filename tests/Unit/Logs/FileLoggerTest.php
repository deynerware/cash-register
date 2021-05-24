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
        Log::setLogger(new FileLogger);

        Log::info('this is a test');

        $this->assertStringContainsString();
    }

    /** @test */
    public function can_instantiate_an_object()
    {
        $log = Log::setLogger(new FileLogger);
        $filelogger = Log::getLogger();

        $this->assertInstanceOf(FileLogger::class, $filelogger);
    }


}
