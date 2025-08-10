<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'employment_type',
        'salary_range',
        'skills',
    ];
}
