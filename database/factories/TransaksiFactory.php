<?php

use App\Model\Tiket\Tiket;
use Faker\Generator as Faker;

$factory->define(App\Model\Transaksi\Transaksi::class, function (Faker $faker) {
    return [
        'id_tiket' =>function(){
            return Tiket::all()->random();
        },
        'qty'=>rand(1,30),
        'status'=>rand(0,1),
    ];
});
