<?php
namespace App\View\Components;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TabLocations extends Component
{
    public $user;
    public $locations;
    public $currentLocationId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user, string $currentLocationId)
    {
        $this->user = $user;
        $this->locations = $user->locations;
        $this->currentLocationId = $currentLocationId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tab-locations');
    }
}
