<?php

use Faker\Generator as Faker;

$factory->define(App\Performance::class, function (Faker $faker) {
    return [
        'produto_id' => factory(App\Produto::class)->create()->id,
        'preco_concorrencia' => $faker->randomFloat(2, 0, 8)
    ];
});
