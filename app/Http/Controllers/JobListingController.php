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

    public function index(Request $request) // 2. Function mein (Request $request) add karein
    {
        // 3. auth()->user() ko $request->user() se badal dein
        $jobs = $request->user()->jobListings()->latest()->paginate(5);
        return view('job_listings.show', ['jobs' => $jobs]);
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

    public function edit(JobListing $job)
    {
        // Yeh function 'edit.blade.php' view ko return karega
        // aur saath mein woh job data bhejega jise edit karna hai.
        return view('job_listings.edit', ['job' => $job]);
    }

    public function update(Request $request, JobListing $job)
    {
        // Validation rules store method jaise hi rahenge.
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:Full-time,Part-time,Contract,Internship,Temporary',
            'salary_range' => 'nullable|string|max:100',
            'skills' => 'required|string|min:5'
        ]);

        // Job model ko naye data se update karein.
        $job->update($validatedData);

        // User ko success message ke saath redirect karein.
        return redirect('/dashboard')->with('success', 'Job updated successfully!');
    }

    public function destroy(JobListing $job)
    {
        // You can add an authorization check here to ensure
        // only the owner of the job can delete it.
        // For example:
        // $this->authorize('delete', $job);

        // Delete the job from the database
        $job->delete();

        // Redirect back to the job listings page with a success message
        return redirect()->route('job-listings.show')
            ->with('success', 'Job listing has been deleted successfully.');
    }
}
