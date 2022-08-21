<?php
namespace App\View\Components;

use App\Models\Job;
use Illuminate\View\Component;

class SelectJob extends Component
{
    public $jobs;
    public $filterByJobId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $filterByJobId = '')
    {
        $this->filterByJobId = $filterByJobId;
        $this->jobs = Job::orderBy('position')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-job');
    }
}
