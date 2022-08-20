<?php
namespace App\Repositories;

use App\Models\City;
use App\Models\User;

class CityRepository
{
    public function index(array $filters)
    {
        $citiesQuery = City::where('country_id', $filters['country_id'])
        ->where(function ($query) use ($filters) {
            $query->where('name', 'ilike', $filters['search'] . '%')
                ->orWhere('zip_code', 'ilike', '%' . $filters['search'] . '%');
        })
        ->orderBy('name');

        return $citiesQuery->limit(10)->get();
    }
}
