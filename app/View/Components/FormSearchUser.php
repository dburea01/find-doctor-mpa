<?php
namespace App\View\Components;

use Illuminate\View\Component;

class FormSearchUser extends Component
{
    public $search;
    public $city;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($search, $city)
    {
        $this->search = $search;
        $this->city = $city;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-search-user');
    }
}
