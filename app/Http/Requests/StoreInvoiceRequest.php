<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    // public function authorize()
    // {
    //     // adjust auth logic as needed
    //     return $this->user() && $this->user()->can('create', \App\Models\Invoice::class);
    // }

    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_address' => 'nullable|string',
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:issue_date',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string|max:1000',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.hsn' => 'nullable|string|max:50',
            'tax' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:draft,sent,paid,cancelled',
            'currency' => 'nullable|string|max:8',
            'notes' => 'nullable|string',
            'download' => 'nullable|boolean',
            'send_email' => 'nullable|boolean',
        ];
    }

    // Optionally normalize incoming values
    protected function prepareForValidation()
    {
        $this->merge([
            'tax' => $this->input('tax', 0),
            'discount' => $this->input('discount', 0),
        ]);
    }
}
