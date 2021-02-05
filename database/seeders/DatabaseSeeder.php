<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use \App\Models\Grupo;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        \App\Models\Grupo::truncate();
        \App\Models\Matricula::truncate();
        \App\Models\User::factory(10)->create();
        \App\Models\Grupo::factory(20)->create();
        \App\Models\Matricula::factory(15)->create();

        //Creara tres grupos relacionados con un usuario, que sera el 11 en la BBDD
        $user = User::factory()
        ->has(Grupo::factory()->count(3))
        ->create();

    }

}
