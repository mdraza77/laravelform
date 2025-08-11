<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        // Fetch only the soft-deleted jobs for the logged-in user
        $trashedJobs = $request->user()
                               ->jobListings()
                               ->onlyTrashed()
                               ->latest('deleted_at')
                               ->paginate(5);

        return view('settings.index', ['trashedJobs' => $trashedJobs]);
    }

    /**
     * Restore a specific soft-deleted job.
     */
    public function restore(Request $request, $id)
    {
        // Find the trashed job belonging to the user
        $job = $request->user()
                       ->jobListings()
                       ->onlyTrashed()
                       ->findOrFail($id);

        // Restore the job
        $job->restore();

        return redirect()->route('settings.index')->with('success', 'Job has been restored successfully!');
    }
}
