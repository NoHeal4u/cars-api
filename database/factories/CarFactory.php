<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'brand' => $faker->randomElement($array = array ('Audi','BMW','Renault')),
        'model' => $faker->randomElement($array = array ('Coupe','Limo','CrossCountry')),
        'year' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'maxSpeed' => $faker->numberBetween($min = 140, $max = 300),
        'isAutomatic' => $faker->boolean($chanceOfGettingTrue = 50),
        'engine' => $faker->randomElement($array = array ('Diesel','Petrol','Hybrid','Electric')),
        'numberOfDoors' => $faker->numberBetween($min = 3, $max = 5)
    ];
});
