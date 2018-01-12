<?php

require_once __DIR__ . '/documento.php';

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Client::class, function (Faker\Generator $faker) {
   
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'telefone' => $faker->phoneNumber,
        'inadimplente' => rand(0,1),
    ];
});

$factory->state(\App\Client::class, 'pessoa_fisica', function(\Faker\Generator $faker) {
    $cpfs = cpfs();
    return [
        'documento' => $cpfs[array_rand($cpfs,1)],
        'data_nasc' => $faker->date(),
        'estado_civil' => rand(1,3),
        'sexo' => rand(1,10) % 2 == 0 ? 'm' : 'f',
        'deficiencia_fisica' => $faker->word,
    ];
});

$factory->state(\App\Client::class, 'pessoa_juridica', function(\Faker\Generator $faker) {
    $cnpjs = cnpjs();
    return [
        'documento' => $cnpjs[array_rand($cnpjs,1)],
        'fantasia' => $faker->company,
    ];
});