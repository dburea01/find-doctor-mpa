<?php
namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationContact;
use App\Models\MeanContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = Location::all();
        // $meanContacts = MeanContact::all();

        foreach ($locations as $location) {
            // 1 à 3 phones contacts
            for ($i = 0; $i < random_int(1, 3); $i++) {
                LocationContact::factory()->create([
                    'location_id' => $location->id,
                    'mean_contact_id' => 'PHONE',
                    'mean_contact' => fake()->phoneNumber(),
                ]);
            }

            // 1 email
            LocationContact::factory()->create([
                'location_id' => $location->id,
                'mean_contact_id' => 'EMAIL',
                'mean_contact' => fake()->email(),
            ]);
        }
    }
}
