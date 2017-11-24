<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsuariosSeeds::class);
         $this->call(PaginasSeeds::class);

        // factory(\App\User::class, 10)->create();

    }
}
