<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio = new municipio;
        $municipio->NombreMunicipio = 'Medellin';
        $municipio->PrecioEnvio = 10000;
        $municipio->save();
    }
}
