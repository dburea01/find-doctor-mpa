<?php
namespace Database\Seeders;

use App\Models\Job;
use App\Models\Language;
use App\Models\User;
use App\Models\UserJob;
use App\Models\UserLanguage;
use Illuminate\Database\Seeder;

class UserJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $jobs = Job::all();

        foreach ($users as $user) {
            $randomJobs = $jobs->random(random_int(1, 2));
            foreach ($randomJobs as $randomJob) {
                UserJob::factory()->create([
                    'user_id' => $user->id,
                    'job_id' => $randomJob->id,
                ]);
            }
        }
    }
}
