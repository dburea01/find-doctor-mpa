<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function index(array $filters)
    {
        $usersQuery = User::orderBy('last_name');

        if (array_key_exists('search', $filters) && $filters['search'] !== null && strlen($filters['search']) > 1) {
            $usersQuery->where(function ($query) use ($filters) {
                $query->where('last_name', 'ilike', '%' . $filters['search'] . '%')
                      ->orWhere('first_name', 'ilike', '%' . $filters['search'] . '%');
            });
        }

        return $usersQuery->paginate();
    }
}
