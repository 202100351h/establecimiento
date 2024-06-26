<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Jhojan',
            'email'=> 'Jhojan@correo.com',
            'email_verified_at'=> Carbon:: now (),
            'password'=> Hash::make('12345678'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('users')->insert([
            'name'=> 'Paul',
            'email'=> 'Paul@correo.com',
            'email_verified_at'=> Carbon:: now (),
            'password'=> Hash::make('12345678'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);
    }
}
