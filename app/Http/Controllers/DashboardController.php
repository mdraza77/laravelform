<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // Get the ID of the currently logged-in user
        $currentUserId = $request->user()->id;

        // Fetch all jobs where the user_id is NOT the current user's ID
        $jobs = JobListing::where('user_id', '!=', $currentUserId)
            ->with('user') // Eager load the user to prevent extra queries
            ->latest()
            ->paginate(9); // Paginate the results

        // Pass the jobs to the dashboard view
        return view('dashboard', ['jobs' => $jobs]);
    }
}
