<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Invoice extends Model
{
    protected $fillable = [
        'number',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'issue_date',
        'due_date',
        'subtotal',
        'tax',
        'discount',
        'total',
        'status',
        'currency',
        'notes',
        'pdf_path'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
    ];

    // Convenience: create a human-friendly invoice number
    public static function makeNumber(): string
    {
        return 'INV-'.now()->format('Ymd').'-'.Str::upper(Str::random(4));
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class)->orderBy('sort_order')->orderBy('id');
    }
}
