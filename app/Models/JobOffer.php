<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'url_original',
        'is_processed'
    ];

    protected $casts = [
        'is_processed' => 'boolean',
    ];
}
