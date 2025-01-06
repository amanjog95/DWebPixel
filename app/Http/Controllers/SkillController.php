<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{

    // Fetch all skills
    public function index()
    {
        $skills = Skill::all(); // Retrieve all skills from the database
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill = Skill::create([
            'name' => $request->name,
        ]);

        return response()->json($skill, 201); // Return the created skill as JSON
    }

    // Show the edit form
    public function edit($id)
    {
        $skill = Skill::findOrFail($id); // Find the skill by ID
        return view('admin.skills.edit', compact('skill')); // Pass the skill to the view
    }

    // Update the skill
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update([
            'name' => $request->name,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully!');
    }

    // Delete a skill
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully!');
    }

}
