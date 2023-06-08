<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CajeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Cajero';
        $user->telefono = '1230987650';
        $user->direccion = 'calle 13';
        $user->email = 'cajero@gmail.com';
        $user->password = '1234';
        $user->municipio_id = 1;
        $user->role_id = 2;
        $user->save();
    }
}
