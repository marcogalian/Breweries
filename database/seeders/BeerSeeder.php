<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Beer;


class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Llamamos al modelo
        // $beer = new Beer();
        // $beer->fill([
        //     'name' => 'Mahou Clasica',
        //     'type' => 'lager',
        //     'vol' => 4.8
        // ]);
        // $beer->saveOrFail();

        // $beer = new Beer();
        // $beer->fill([
        //     'name' => 'Alhambra Verde Reserva 1925',
        //     'type' => 'pilsener',
        //     'vol' => 6.4
        // ]);
        // $beer->saveOrFail();

    }
}
