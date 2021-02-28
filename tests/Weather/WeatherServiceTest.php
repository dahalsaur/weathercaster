<?php
declare(strict_types=1);

namespace Tests\Weather;

use PHPUnit\Framework\TestCase;
use Weather\WeatherService;

class WeatherServiceTest extends TestCase
{
    public function testGetWeatherWithNoCity(): void
    {
        $argv = [
            './bin/weather.php'
        ];

        $weatherService = new WeatherService($argv);
        $this->assertEquals('Nothing to geocode', $weatherService->getWeather());
    }

    public function testGetWeatherWithFakeCityName(): void
    {
        $argv = [
            './bin/weather.php',
            'Fake City'
        ];

        $weatherService = new WeatherService($argv);
        $this->assertEquals('city not found', $weatherService->getWeather());
    }

    public function testGetWeatherWithRealCityName(): void
    {
        $argv = [
            './bin/weather.php',
            'Berlin'
        ];
        $weatherService = new WeatherService($argv);
        $this->assertStringContainsString('degree celsius', $weatherService->getWeather());

        //two words city name
        $argv = [
            './bin/weather.php',
            'New York'
        ];
        $weatherService = new WeatherService($argv);
        $this->assertStringContainsString('degree celsius', $weatherService->getWeather());
    }
}