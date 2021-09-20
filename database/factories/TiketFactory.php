<?php

use App\Model\Categori\Categori;
use Faker\Generator as Faker;

$factory->define(App\Model\Tiket\Tiket::class, function (Faker $faker) {
    $word=$faker->word; 
    return [
        'name_tiket' =>$word,
        'harga_tiket'=>rand(1,1000),
        'jumlah_tiket'=>rand(1,30),
        'id_kategori'=>function(){
            return Categori::all()->random();
        },
        'jenis_tiket'=>$word,

    ];
});
