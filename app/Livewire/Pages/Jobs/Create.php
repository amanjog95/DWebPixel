<?php
namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithFileUploads;
use App\Models\Skill;

class Create extends Component
{

    use WithFileUploads;

    public $title, $description, $company_logo, $company_name, $experience, $salary, $location, $skills, $extra,$allskills;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'company_name' => 'required|string|max:255',
        'company_logo' => 'nullable|image|max:2024', // Allow images only, max size 2MB
        'experience' => 'required|string',
        'salary' => 'nullable|numeric',
        'location' => 'required|string|max:255',
        'skills' => 'nullable|array', // Skills can be an array
        'extra' => 'nullable|string',
    ];

    public function mount()
    {
        $this->allskills = Skill::all(); // Fetch all skills from the database
    }

    public function submit()
    {
        $this->validate();

        // Store the logo file
        $logoPath = null;
        if ($this->company_logo) {
            $logoPath = $this->company_logo->store('company_logos', 'public');
        }

        // Create the new job
        Job::create([
            'title' => $this->title,
            'description' => $this->description,
            'company_name' => $this->company_name,
            'company_logo' => $logoPath,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'location' => $this->location,
            'skills' => json_encode($this->skills), // Store skills as JSON
            'extra' => $this->extra,
        ]);

        session()->flash('success', 'Job posting created successfully!');
        return redirect()->route('admin.jobs.index');
    }


    public function render()
    {
        return view('livewire.pages.jobs.create', [
            'skills' => $this->allskills
        ]);
    }
}