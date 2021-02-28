# Weathercaster

A PHP-based command line app which prints the current weather of any city which you specify as argument.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

* PHP 7.4
* Composer

### Installing
1. Copy `.env.example` file to `.env`
```
cp .env.example .env
```
 
2. Enter your OpenWeatherMap API key in `.env`
```
API_KEY=YOURAPIKEY
```
2. Install composer packages
```
composer install
```

## Running the app
```
./bin/weather.php Berlin
```

## Running the tests
```
./vendor/bin/phpunit tests
```




