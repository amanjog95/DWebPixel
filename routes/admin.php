<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Jobs\{Index as JobIndex,Create as CreateJob,};
use App\Livewire\Pages\Skills\{Index as SkillsIndex};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SkillController;

Route::redirect('/', '/admin/dashboard');

// Dashboard
Route::get('/dashboard', Dashboard::class)->name('dashboard');

// Skills
Route::get('/skills', SkillsIndex::class)->name('skills.index');
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');
Route::get('/skills/{id}/edit', [SkillController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');

// Jobs
Route::get('/jobs', JobIndex::class)->name('jobs.index');
Route::get('/jobs/create', CreateJob::class)->name('jobs.create');
Route::delete('/jobs/{id}', [JobIndex::class, 'delete'])->name('jobs.delete');

