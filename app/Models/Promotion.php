<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'button_text',
        'button_link',
        'timer',
        'status',
        'show_interval',   // in hours — how often to show again
        'start_date',      // when promotion starts
        'end_date',        // when promotion ends
    ];

    protected $casts = [
        'status' => 'boolean',
        'timer' => 'integer',
        'show_interval' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}
