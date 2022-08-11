<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\User;
use App\Models\UserLanguage;
use Illuminate\Database\Seeder;

class UserLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $languages = Language::all();

        foreach ($users as $user) {
            for ($i = 0; $i < random_int(1, count($languages)); $i++) {
                UserLanguage::factory()->create([
                    'user_id' => $user->id,
                    'language_id' => $languages[$i]->id,
                ]);
            }
        }
    }
}
