<?php

use Illuminate\Database\Seeder;
use App\Gesture;
use App\GestureType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $gesture_type = GestureType::create(['name' => 'Facial']);
        $gesture_type2 = GestureType::create(['name' => 'Voz']);
        $gesture_type3 = GestureType::create(['name' => 'Táctil']);
        
        // $this->call(UsersTableSeeder::class);
        Gesture::create(['name' => 'Sonrisa', 'gesture_type_id' => $gesture_type->id]);
        Gesture::create(['name' => 'Gesto con la boca', 'gesture_type_id' => $gesture_type->id]);
        Gesture::create(['name' => 'Decir: Hola', 'gesture_type_id' => $gesture_type2->id]);

    }
}
