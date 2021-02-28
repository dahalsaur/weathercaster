<?php
declare(strict_types = 1);

namespace Weather;

use App\App;

class WeatherService extends App implements IWeatherService
{
    private string $city;
    private string $apiKey;

    /**
     * Create a new WeatherService instance.
     *
     * @param array $argv
     */
    public function __construct(array $argv)
    {
        parent::__construct($argv);
        $this->city = parent::getCity();
        $this->apiKey = parent::getAPIKey();
    }

    /**
     * @inheritdoc
     */
    public function getWeather(): string
    {
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $this->city . "&lang=en&units=metric&appid=" . $this->apiKey;

        //initialize, set, execute and close curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if ($data['cod'] !== 200) {
            //return error message
            return $data['message'];
        } else {
            // return weather details
            return $data['weather'][0]['description'] . ', ' . $data['main']['temp'] . ' degree celsius';
        }
    }
}