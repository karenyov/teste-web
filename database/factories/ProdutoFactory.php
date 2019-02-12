<?php

use Faker\Generator as Faker;

$factory->define(App\Produto::class, function (Faker $faker) {
    return [
        'descricao' => $faker->word,
        'marca_id' => factory(App\Marca::class)->create()->id,
        'fabricante_id' => factory(App\Fabricante::class)->create()->id,
        'preco' => $faker->randomFloat(2, 0, 8)
    ];
});
