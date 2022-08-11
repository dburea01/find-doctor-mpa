<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Database\Seeder;

class UserLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $locations = Location::all();

        foreach ($users as $user) {
            $randomLocations = $locations->random(random_int(1, 2));
            foreach ($randomLocations as $randomLocation) {
                UserLocation::factory()->create([
                    'user_id' => $user->id,
                    'location_id' => $randomLocation->id,
                ]);
            }
        }
    }
}
