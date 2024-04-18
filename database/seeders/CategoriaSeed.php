<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'=> 'Restaurante',
            'slug'=> Str::slug('Restaurante'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('categorias')->insert([
            'nombre'=> 'Cafe',
            'slug'=> Str::slug('Cafe'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('categorias')->insert([
            'nombre'=> 'Panaderia',
            'slug'=> Str::slug('Panaderia'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('categorias')->insert([
            'nombre'=> 'Hostal',
            'slug'=> Str::slug('Hotal'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('categorias')->insert([
            'nombre'=> 'Farmacia',
            'slug'=> Str::slug('Farmacia'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('categorias')->insert([
            'nombre'=> 'gym',
            'slug'=> Str::slug('gym'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);

        DB::table('categorias')->insert([
            'nombre'=> 'Doctor',
            'slug'=> Str::slug('Doctor'),
            'created_at'=> Carbon:: now (),
            'updated_at'=> Carbon:: now ()
        ]);
    }
}
