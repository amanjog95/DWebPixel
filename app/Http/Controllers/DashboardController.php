<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\JobDetails;

class DashboardController extends Controller
{

    public function index()
    {
        // Fetch jobs from the database
        $jobs = JobDetails::select('id', 'title', 'description', 'company_name', 'company_logo', 'experience', 'salary', 'location', 'skills', 'extra')
            ->latest()
            ->get();

        return Inertia::render('Dashboard', ['jobs' => $jobs]);
    }

}
