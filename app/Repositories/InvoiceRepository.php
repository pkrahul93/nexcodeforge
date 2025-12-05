<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;

class InvoiceRepository
{
    public function createWithItems(array $payload): Invoice
    {
        // payload expected keys:
        // customer_*, issue_date, due_date, items (array), tax, discount, currency, notes, user_id(optional)

        return DB::transaction(function () use ($payload) {
            $invoiceData = [
                'number' => $payload['number'] ?? Invoice::makeNumber(),
                'user_id' => $payload['user_id'] ?? null,
                'customer_name' => $payload['customer_name'],
                'customer_email' => $payload['customer_email'] ?? null,
                'customer_phone' => $payload['customer_phone'] ?? null,
                'customer_address' => $payload['customer_address'] ?? null,
                'issue_date' => $payload['issue_date'],
                'due_date' => $payload['due_date'] ?? null,
                'status' => $payload['status'] ?? 'draft',
                'currency' => $payload['currency'] ?? 'INR',
                'notes' => $payload['notes'] ?? null,
            ];

            $invoice = Invoice::create($invoiceData);

            $subtotal = 0;
            foreach ($payload['items'] as $index => $it) {
                $quantity = (int)$it['quantity'];
                $unitPrice = (float)$it['unit_price'];
                $amount = round($quantity * $unitPrice, 2);
                $subtotal += $amount;

                $invoice->items()->create([
                    'description' => $it['description'],
                    'hsn' => $it['hsn'] ?? null,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'amount' => $amount,
                    'sku' => $it['sku'] ?? null,
                    'sort_order' => $it['sort_order'] ?? $index,
                ]);
            }

            $tax = (float)($payload['tax'] ?? 0);
            $discount = (float)($payload['discount'] ?? 0);

            $total = round($subtotal + $tax - $discount, 2);

            $invoice->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'discount' => $discount,
                'total' => $total,
            ]);

            return $invoice->fresh('items');
        });
    }

    public function updateWithItems(Invoice $invoice, array $payload): Invoice
    {
        return DB::transaction(function () use ($invoice, $payload) {
            $invoice->update([
                'customer_name' => $payload['customer_name'],
                'customer_email' => $payload['customer_email'] ?? null,
                'customer_phone' => $payload['customer_phone'] ?? null,
                'customer_address' => $payload['customer_address'] ?? null,
                'issue_date' => $payload['issue_date'],
                'due_date' => $payload['due_date'] ?? null,
                'status' => $payload['status'] ?? $invoice->status,
                'currency' => $payload['currency'] ?? $invoice->currency,
                'notes' => $payload['notes'] ?? $invoice->notes,
            ]);

            // easiest approach: delete existing items and recreate
            $invoice->items()->delete();

            $subtotal = 0;
            foreach ($payload['items'] as $index => $it) {
                $quantity = (int)$it['quantity'];
                $unitPrice = (float)$it['unit_price'];
                $amount = round($quantity * $unitPrice, 2);
                $subtotal += $amount;

                $invoice->items()->create([
                    'description' => $it['description'],
                    'hsn' => $it['hsn'] ?? null,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'amount' => $amount,
                    'sku' => $it['sku'] ?? null,
                    'sort_order' => $it['sort_order'] ?? $index,
                ]);
            }

            $tax = (float)($payload['tax'] ?? 0);
            $discount = (float)($payload['discount'] ?? 0);
            $total = round($subtotal + $tax - $discount, 2);

            $invoice->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'discount' => $discount,
                'total' => $total,
            ]);

            return $invoice->fresh('items');
        });
    }
}
