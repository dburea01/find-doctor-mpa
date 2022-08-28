<?php
namespace App\View\Components;

use App\Models\Location;
use Illuminate\View\Component;

class CardLocation extends Component
{
    public $locationId;
    public Location $location;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $locationId)
    {
        $this->locationId = $locationId;
        $this->location = Location::with('city')->with('location_contacts')->find($locationId);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-location');
    }
}
