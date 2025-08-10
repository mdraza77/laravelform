<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class JobListingController extends Controller
{
    public function create()
    {
        return view('job_listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'company' => 'required|string',
            'location' => 'required|string',
            'employment_type' => 'required|string',
            'salary_range' => 'nullable|string',
            'skills' => 'required|string'
        ]);

        JobListing::create($request->all());
        return redirect()->route('job-listings.create')->with('success', 'Job published successfully!');
    }
}
