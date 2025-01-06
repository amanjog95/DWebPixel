<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Job;

class Index extends Component
{
    public $jobs;

    public function mount()
    {

        $this->jobs = Job::all();

    }

    public function deleteJob($id)
    {
        $job = Job::find($id);
    
        if ($job) {
            $job->delete();
            $this->jobs = Job::all(); // Refresh the jobs list
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
