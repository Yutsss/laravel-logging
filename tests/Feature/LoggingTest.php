<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLog()
    {
        Log::info("Hello info");
        Log::warning("Hello warning");
        Log::error("Hello error");
        Log::critical("Hello critical");

        $this->assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello info", ['name' => 'Yuta']);
        Log::warning("Hello warning", ['name' => 'Yuta']);
        Log::error("Hello error", ['name' => 'Yuta']);
        Log::critical("Hello critical", ['name' => 'Yuta']);

        $this->assertTrue(true);
    }

    public function testWithContect()
    {
        Log::withContext(['name' => 'Yuta']);

        Log::info("Hello info");
        Log::warning("Hello warning");
        Log::error("Hello error");
        Log::critical("Hello critical");

        $this->assertTrue(true);
    }

    public function testWithChannel()
    {
        $slackLogger = Log::channel('slack');
        $slackLogger->error("Hello slack");

        Log::info("Hello info"); // default channel

        $this->assertTrue(true);
    }

    public function testFileHandler()
    {
        $fileLogger = Log::channel('file');
        $fileLogger->info("Hello file");
        $fileLogger->warning("Hello file");
        $fileLogger->error("Hello file");
        $fileLogger->critical("Hello file");

        $this->assertTrue(true);
    }

    public function testWithFormatter()
    {
        $fileJsonLogger = Log::channel('fileJson');
        $fileJsonLogger->info("Hello fileJson");
        $fileJsonLogger->warning("Hello fileJson");
        $fileJsonLogger->error("Hello fileJson");
        $fileJsonLogger->critical("Hello fileJson");

        $this->assertTrue(true);
    }
}
