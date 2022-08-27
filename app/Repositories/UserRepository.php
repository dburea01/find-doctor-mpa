<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function index(array $filters)
    {
        $usersQuery = User::orderBy('last_name')->with(['languages', 'civility']);

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

        return $usersQuery->paginate();
    }
}
