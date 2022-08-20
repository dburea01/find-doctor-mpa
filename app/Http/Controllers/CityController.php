<?php
namespace App\Http\Controllers;

use App\Http\Requests\GetCityRequest;
use App\Http\Resources\CityResource;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index(GetCityRequest $request)
    {
        $cities = $this->cityRepository->index($request->all());

        return CityResource::collection($cities);
    }
}
