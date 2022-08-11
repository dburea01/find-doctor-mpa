<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationType;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locationTypes = LocationType::all();

        foreach ($locationTypes as $locationType) {
            Location::factory()->count(random_int(1, 10))->create([
                'location_type_id' => $locationType->id,
            ]);
        }
    }
}
