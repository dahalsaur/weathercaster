#!/usr/bin/env php
<?php
declare(strict_types = 1);

use Weather\WeatherService;

require __DIR__ . '/../vendor/autoload.php';

$weatherService = new WeatherService($argv);
$result = $weatherService->getWeather();
$weatherService->print($result);
