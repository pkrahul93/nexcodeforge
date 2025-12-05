<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'enq_for',
        'subject',
        'website',
        'document',
        'message',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor to get full document URL (if exists)
    public function getDocumentUrlAttribute()
    {
        return $this->document ? asset('uploads/enquiries/' . $this->document) : null;
    }
}
