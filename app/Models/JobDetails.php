<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    
    use HasFactory;
    protected $guarded = ['id'];

    // Add all the fields that you want to be mass assignable
    protected $fillable = [
        'title',
        'description',
        'company_name',
        'company_logo',
        'experience',
        'salary',
        'location',
        'skills',
        'extra',
    ];

}
