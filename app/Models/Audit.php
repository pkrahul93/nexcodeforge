<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audit extends Model
{
    protected $fillable = [
        'audit_number',
        'user_ip',
        'domain',
        'file_name',
        'file_path',
        'meta',
        'stdout',
        'stderr',
        'status',
        'include_whois',
        'started_at',
        'finished_at'
    ];

    protected $casts = [
        'meta' => 'array',
        'include_whois' => 'boolean',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
