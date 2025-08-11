<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ise add karna achhi practice hai
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory; // Ise bhi add karein

    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
        'employment_type',
        'salary_range',
        'skills',
        'user_id', // 1. Is line ko yahan add karein
    ];

    /**
     * Get the user that owns the job listing.
     */
    public function user() // 2. Yeh poora function add karein
    {
        return $this->belongsTo(User::class);
    }
}