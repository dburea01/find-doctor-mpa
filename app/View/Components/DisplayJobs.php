<?php
namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class DisplayJobs extends Component
{
    public $jobs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.display-jobs');
    }
}
