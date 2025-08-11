<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // 1. Trait ko import karein

class JobListingController extends Controller
{
    use AuthorizesRequests; // 2. Trait ko yahan use karein
    public function index(Request $request)
    {
        $jobs = $request->user()->jobListings()->latest()->paginate(5);
        return view('job_listings.show', ['jobs' => $jobs]);
    }
    public function create()
    {
        return view('job_listings.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:Full-time,Part-time,Contract,Internship,Temporary',
            'salary_range' => 'nullable|string|max:100',
            'skills' => 'required|string|min:5'
        ]);

        $request->user()->jobListings()->create($validatedData);
        return redirect()->route('job-listings.show')->with('success', 'Job posted successfully!');
    }

    public function show(JobListing $job)
    {
        // Eager load the user relationship to get the poster's name
        $job->load('user');

        // Return a new view with the single job's data
        return view('job_listings.single', ['job' => $job]);
    }

    public function edit(JobListing $job)
    {
        // Ab yahan red line nahi aayegi
        $this->authorize('update', $job);
        return view('job_listings.edit', ['job' => $job]);
    }

    public function update(Request $request, JobListing $job)
    {
        // 3. Security ke liye yahan bhi authorize add karein
        $this->authorize('update', $job);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:Full-time,Part-time,Contract,Internship,Temporary',
            'salary_range' => 'nullable|string|max:100',
            'skills' => 'required|string|min:5'
        ]);

        $job->update($validatedData);
        return redirect()->route('job-listings.show')->with('success', 'Job updated successfully!');
    }

    public function destroy(JobListing $job)
    {
        // 4. Delete ke liye bhi authorization ko enable karein
        $this->authorize('delete', $job);

        $job->delete();
        return redirect()->route('job-listings.show')
            ->with('success', 'Job listing has been deleted successfully.');
    }
}
