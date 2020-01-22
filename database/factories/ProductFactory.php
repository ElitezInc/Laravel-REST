<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $Products = Array("Shorts","Pants","Hat","Jeans","Cargos","Coat","Jacket","Umbrella","Sweatshirt","Suit","T-Shirt","Gloves","Shoes");
    
    return [
        'sku' => substr($faker->uuid, 0, 6),
        'name' => $faker->colorName . ' ' . $Products[array_rand($Products)],
        'price' => $faker->randomNumber(2) . '.' . $faker->randomNumber(2)
    ];
});
