<?php
declare(strict_types = 1);

namespace App;

use Dotenv\Dotenv;
use Exception;

class App implements IApp
{
    private array $argv;

    /**
     * Create a new App instance.
     *
     * @param array $argv
     */
    public function __construct(array $argv)
    {
        $this->argv = $argv;
    }

    /**
     * @inheritdoc
     */
    public function getCity(): string
    {
        //implode arguments to a string, separated by space (since a city name could have more than one words, ex: New York)
        return implode(' ', array_slice($this->argv, 1));
    }

    /**
     * @inheritdoc
     */
    public function getAPIKey(): string
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../');

        // load API_KEY from .env file
        try {
            $dotenv->load();

            //API_KEY as a required variable
            $dotenv->required('API_KEY')->notEmpty();
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $_ENV['API_KEY'];
    }

    /**
     * @inheritdoc
     */
    public function print(string $value)
    {
        echo $value;
    }
}