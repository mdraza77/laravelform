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
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:Full-time,Part-time,Contract,Internship,Temporary',
            'salary_range' => 'nullable|string|max:100',
            'skills' => 'required|string|min:5'
        ]);

        JobListing::create($request->all());
        return redirect()->route('job-listings.create')->with('success', 'Job published successfully!');
    }
}
