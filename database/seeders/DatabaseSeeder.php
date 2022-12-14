<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LocationContact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserLanguageSeeder::class,
            UserJobSeeder::class,
            LocationSeeder::class,
            UserLocationSeeder::class,
            LocationContactSeeder::class
        ]);
    }
}
