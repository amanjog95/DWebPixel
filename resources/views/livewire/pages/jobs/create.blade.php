<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Create New Job Posting</h1>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 shadow-lg rounded-lg dark:bg-gray-800">
            <form wire:submit.prevent="submit" class="space-y-8">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <!-- Job Details Section -->
                <section>
                    <header>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Job Details</h2>
                    </header>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" id="title" wire:model="title" placeholder="Title" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>

                        <!-- Description -->
                        <div class="col-span-full">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea id="description" wire:model="description" placeholder="Description" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600"></textarea>
                        </div>

                        <!-- Experience -->
                        <div>
                            <label for="experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Experience</label>
                            <input type="text" id="experience" wire:model="experience" placeholder="Experience" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>

                        <!-- Salary -->
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salary</label>
                            <input type="text" id="salary" wire:model="salary" placeholder="Salary" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                            <input type="text" id="location" wire:model="location" placeholder="Location" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>

                        <!-- Extra Info -->
                        <div>
                            <label for="extra" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Extra Info</label>
                            <input type="text" id="extra" wire:model="extra" placeholder="Extra Info" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>
                    </div>
                </section>

                <!-- Company Details Section -->
                <section>
                    <header>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Company Details</h2>
                    </header>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Company Name -->
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name</label>
                            <input type="text" id="company_name" wire:model="company_name" placeholder="Company Name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>

                        <!-- Company Logo -->
                        <div>
                            <label for="company_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Logo</label>
                            <input type="file" id="company_logo" wire:model="company_logo" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" />
                        </div>

                        <!-- Skills -->
                        <div class="col-span-full">
                            <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skills</label>
                            <select id="skills" wire:model="skills" required multiple
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                                <option value="php">PHP</option>
                                <option value="javascript">JavaScript</option>
                                <option value="html">HTML</option>
                                <option value="css">CSS</option>
                                <option value="laravel">Laravel</option>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-blue-400 dark:hover:bg-blue-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
