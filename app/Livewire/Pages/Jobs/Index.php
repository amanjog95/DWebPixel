<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\JobDetails;

class Index extends Component
{
    public $jobs;

    public function mount()
    {

        $this->jobs = JobDetails::all();

    }

    public function deleteJob($id)
    {
        $job = JobDetails::find($id);
    
        if ($job) {
            $job->delete();
            $this->jobs = JobDetails::all(); // Refresh the jobs list
            session()->flash('message', 'Job deleted successfully.');
        } else {
            session()->flash('error', 'Job not found.');
        }
    }
    

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
