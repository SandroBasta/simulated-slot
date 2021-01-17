# Introduction

In this test, you need to do a small part of a simulated slot machine using Lumen
(https://lumen.laravel.com/docs/5.5).

To make it as simple as possible you need to create a console command inside the project created using Lumen.

Files structure:

```
src
├── app
│   ├── Board.php
│   ├── Game.php
│   └── Console
│       ├── Commands
|       |   └── Slot.php
│       └── Kernel.php
└── tests
    └── GameTest.php
```

# Installation

Clone the project

```
git clone git@github.com:SandroBasta/simulated-slot.git
cd simulated-slot/src

composer install
cp .env.example > .env
```

## Running application

To play  run the follow command:

`php artisan spin:slot`

## Unit Test

A unit test is provided with this project, testing scenario such as winning line with 3,4 and 5 symbols on one and two
paylines

To run the test use the following command:

`./vendor/bin/phpunit`

PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

........ 8 / 8 (100%)

Time: 27 ms, Memory: 6.00MB

OK (8 tests, 9 assertions)

# Docker Installation

Clone the project

```
git clone git@github.com:SandroBasta/simulated-slot.git
cd simulated-slot
docker-compose up -d
```

## Running application

To play run the follow command:

`docker exec -it app sh`

/app # php artisan spin:slot

Output:
{
    "board":["dog","9","bird","dog","cat","dog","dog","Q","9","J","10","dog","J","9","dog"],
    "paylines":[{"0 3 6 9 12":3}],
    "bet_amount":100,"total_win":20
}

## Unit Test

A simple unit test is provided with this project, testing common scenario such as winning line with 3,4 and 5 symbols

To run the test use the following command:

`docker exec -it app sh`
                   
/app # ./vendor/bin/phpunit
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

........                                                            8 / 8 (100%)

Time: 40 ms, Memory: 6.00MB

OK (8 tests, 9 assertions)
