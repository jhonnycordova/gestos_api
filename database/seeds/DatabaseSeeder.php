<?php

use Illuminate\Database\Seeder;
use App\Gesture;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Gesture::create(['name' => 'Sonrisa']);
        Gesture::create(['name' => 'Pulgar Arriba']);
        Gesture::create(['name' => 'Decir: Hola']);
    }
}
