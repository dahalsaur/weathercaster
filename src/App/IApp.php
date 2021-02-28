<?php
declare(strict_types = 1);

namespace App;

interface IApp
{
    /**
     * Get city from passed argument.
     *
     * @return  string
     */
    public function getCity(): string;

    /**
     * Get API key from .env file.
     *
     * @return  string
     */
    public function getAPIKey(): string;

    /**
     * Print the passed value to console.
     *
     * @param string $value
     */
    public function print(string $value);
}