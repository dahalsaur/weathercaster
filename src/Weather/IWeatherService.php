<?php
declare(strict_types = 1);

namespace Weather;

use App\IApp;

interface IWeatherService extends IApp
{
    /**
     * Get weather details from OpenWeatherMap API.
     *
     * @return string
     */
    public function getWeather(): string;
}