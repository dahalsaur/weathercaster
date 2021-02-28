<?php
declare(strict_types=1);

namespace Tests\App;

use App\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    private array $argv;

    protected function setUp(): void
    {
        $this->argv = [
            './bin/weather.php',
            'Berlin'
        ];
    }

    public function testGetCity(): void
    {
        $app = new App($this->argv);
        $this->assertEquals('Berlin', $app->getCity());
    }

    public function testGetAPIKey(): void
    {
        $app = new App($this->argv);
        $this->assertNotNull($app->getAPIKey());
    }
}