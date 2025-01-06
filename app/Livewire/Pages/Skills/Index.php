<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;

class Index extends Component
{
    public $skills;
    public $editingSkillId;
    public $skillName;

    public function mount()
    {
        $this->skills = Skill::all(); // Fetch all skills from the database
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $this->editingSkillId = $skill->id;
        $this->skillName = $skill->name; // Populate the form fields with the skill's current data
    }

    public function updateSkill()
    {
        $this->validate([
            'skillName' => 'required|string|max:255',
        ]);

        $skill = Skill::findOrFail($this->editingSkillId);
        $skill->update([
            'name' => $this->skillName,
        ]);

        $this->skills = Skill::all(); // Re-fetch the skills list after update
        $this->editingSkillId = null;
        $this->skillName = ''; // Clear the input field
        session()->flash('success', 'Skill updated successfully!');
    }

    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        $this->skills = Skill::all(); // Re-fetch the skills list after deletion
    }

    public function render()
    {
        return view('livewire.pages.skills.index', [
            'skills' => $this->skills
        ]);
    }
}

