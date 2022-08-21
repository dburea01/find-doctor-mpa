<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function index(array $filters)
    {
        // $usersQuery = User::with(['jobs', 'languages', 'locations'])->orderBy('last_name');

        $usersQuery = User::orderBy('last_name');

        $usersQuery->with(['languages', 'civility']);

        $usersQuery->withWhereHas('locations', function ($query) use ($filters) {
            if (array_key_exists('filterByCityId', $filters) && $filters['filterByCityId'] !== null) {
                $query->where('locations.city_id', $filters['filterByCityId']);
            }
        });

        $usersQuery->withWhereHas('jobs', function ($query) use ($filters) {
            if (array_key_exists('filterByJobId', $filters) && $filters['filterByJobId'] !== null) {
                $query->where('jobs.id', $filters['filterByJobId']);
            }
        });

        if (array_key_exists('search', $filters) && $filters['search'] !== null && strlen($filters['search']) > 1) {
            $usersQuery->where(function ($query) use ($filters) {
                $query->where('last_name', 'ilike', '%' . $filters['search'] . '%')
                              ->orWhere('first_name', 'ilike', '%' . $filters['search'] . '%');
            });
        }

        /*
        $usersQuery = DB::table('users')
        ->join('user_locations', 'users.id', 'user_locations.user_id')
        ->join('locations', 'locations.id', 'user_locations.location_id')
        ->join('user_languages', 'users.id', 'user_languages.user_id')
        ->join('languages', 'languages.id', 'user_languages.language_id')
        ->join('user_jobs', 'user_jobs.user_id', 'users.id')
        ->join('jobs', 'jobs.id', 'user_jobs.job_id');

        if (array_key_exists('search', $filters) && $filters['search'] !== null && strlen($filters['search']) > 1) {
            $usersQuery->where(function ($query) use ($filters) {
                $query->where('users.last_name', 'ilike', '%' . $filters['search'] . '%')
                      ->orWhere('users.first_name', 'ilike', '%' . $filters['search'] . '%');
            });
        }
        */
        /*
                $usersQuery = User::orderBy('last_name')
                ->join('user_locations', 'users.id', 'user_locations.user_id')
                ->join('locations', 'locations.id', 'user_locations.location_id')
                ->join('user_languages', 'users.id', 'user_languages.user_id')
                ->join('languages', 'languages.id', 'user_languages.language_id')
                ->join('user_jobs', 'user_jobs.user_id', 'users.id')
                ->join('jobs', 'jobs.id', 'user_jobs.job_id')
                ->select('users.*');
        */
        return $usersQuery->paginate();
    }
}
