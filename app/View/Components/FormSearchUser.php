<?php
namespace App\View\Components;

use Illuminate\View\Component;

class FormSearchUser extends Component
{
    public $search;
    public $filterByCityId;
    public $cityName;
    public $filterByJobId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($search = '', $filterByCityId = '', $cityName = '', $filterByJobId = '')
    {
        $this->search = $search;
        $this->filterByCityId = $filterByCityId;
        $this->cityName = $cityName;
        $this->filterByJobId = $filterByJobId;
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
