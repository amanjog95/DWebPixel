<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Skills Table -->
    <section class="max-w-xl">
      <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Skills</h2>
      </header>
      <div class="mt-4 overflow-hidden rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-right text-sm font-medium text-gray-500 dark:text-gray-300">
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
          @foreach($skills as $skill)
            <tr>
              <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $skill->name }}</td>
              <td class="px-6 py-4 text-sm text-right">
                <button wire:click="editSkill({{ $skill->id }})" class="text-blue-500 hover:underline dark:text-blue-400">Edit</button>
                <span class="mx-2">|</span>
                <button wire:click="deleteSkill({{ $skill->id }})" class="text-red-500 hover:underline dark:text-red-400">Delete</button>
              </td>
            </tr>
            @endforeach
            <!-- Repeat rows for other skills -->
          </tbody>
        </table>
      </div>
    </section>

    <!-- Add Skill Form -->
    <section class="max-w-xl">
      <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Add new skill</h2>
      </header>
      <form class="mt-6 space-y-6">
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="skill_name">
            Name
          </label>
          <input
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
            id="skill_name"
            type="text"
            placeholder="Skill name"
            require="required"
          >
        </div>
        <div class="flex items-center gap-4">
          <button
            type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-blue-400 dark:hover:bg-blue-500"
          >
            Save
          </button>
        </div>
      </form>
    </section>

    <!-- Edit Skill Form -->
    @if($editingSkillId)
    <section class="max-w-xl">
      <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Edit skill</h2>
      </header>
      <form wire:submit.prevent="updateSkill" class="mt-6 space-y-6">
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="skill_name">
            Name
          </label>
          <input
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
            id="skill_name"
            wire:model="skillName"
            type="text"
            placeholder="Skill name"
            require="required"
          >
        </div>
        <div class="flex items-center gap-4">
          <button
            type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-blue-400 dark:hover:bg-blue-500"
          >
            Update
          </button>

          <button
            type="button"
            wire:click="$set('editingSkillId', null)"
            class="inline-flex items-center rounded-md border border-transparent bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-blue-400 dark:hover:bg-blue-500"
          >
            Cancel
          </button>

        </div>
      </form>
    </section>  
    @endif

  </div>
</div>


    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form'); // Select the form

    form.addEventListener('submit', async (event) => {
      event.preventDefault(); // Prevent the default form submission

      const skillName = document.getElementById('skill_name').value; // Get skill name input

      try {
        const response = await fetch('/admin/skills', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF Token
          },
          body: JSON.stringify({ name: skillName }),
        });

        if (response.ok) {
          const data = await response.json();
          alert('Skill added successfully!');
          // Optionally update the table with the new skill
          const table = document.querySelector('table tbody');
          const newRow = `
            <tr>
              <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">${data.name}</td>
              <td class="px-6 py-4 text-sm text-right">
                <a href="#" class="text-blue-500 hover:underline dark:text-blue-400">Edit</a>
                <span class="mx-2">|</span>
                <button wire:click="deleteSkill(${data.id})" class="text-red-500 hover:underline dark:text-red-400">Delete</button>
              </td>
            </tr>
          `;
          table.innerHTML += newRow;
          form.reset(); // Clear the form
        } else {
          alert('Error: Could not add skill.');
        }
      } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while adding the skill.');
      }
    });
  });
</script>
