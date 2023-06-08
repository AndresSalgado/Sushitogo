<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->telefono = '1234567890';
        $user->direccion = 'Calle 13';
        $user->email = 'admin@gmail.com';
        $user->password = '1234';
        $user->municipio_id = 1;
        $user->role_id = 1;
        $user->save();
    }
}
