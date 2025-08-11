<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // 1. Is line ko add karein
use App\Models\JobListing; // 2. Apne JobListing model ko import karein
use App\Policies\JobListingPolicy; // <-- Is line ko add karein


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    protected $policies = [
        JobListing::class => JobListingPolicy::class, // <-- Yeh line yahan add karein
    ];

    public function boot(): void
    {
        View::share('totalJobCount', JobListing::count());
    }
}
