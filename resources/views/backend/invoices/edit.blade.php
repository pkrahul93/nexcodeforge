@extends('layouts.backend.app')
@section('title', 'Edit Quotation')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Quotation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Quotation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            {{-- Must provide $invoice to this view --}}
            <form id="invoice-form" method="POST" action="{{ route('invoices.update', $invoice->id) }}">
                @csrf

                {{-- container for ids of items removed on update --}}
                <div id="deleted-items-container"></div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Customer & Items</h3>
                            </div>

                            <div class="card-body">
                                <!-- Customer fields -->
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <input id="customer_name" name="customer_name" class="form-control" required
                                           value="{{ old('customer_name', $invoice->customer_name ?? '') }}" />
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="customer_email">Customer Email</label>
                                        <input id="customer_email" name="customer_email" type="email"
                                               class="form-control"
                                               value="{{ old('customer_email', $invoice->customer_email ?? '') }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="customer_phone">Customer Phone</label>
                                        <input id="customer_phone" name="customer_phone" type="tel" maxlength="10"
                                               class="form-control"
                                               value="{{ old('customer_phone', $invoice->customer_phone ?? '') }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="customer_address">Customer Address</label>
                                        <textarea class="form-control" name="customer_address" id="customer_address" cols="30"
                                                  rows="3">{{ old('customer_address', $invoice->customer_address ?? '') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="notes">Notes (Optional)</label>
                                        <textarea class="form-control" name="notes" id="notes" cols="30"
                                                  rows="3">{{ old('notes', $invoice->notes ?? '') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="issue_date">Issue Date</label>
                                        <input id="issue_date" name="issue_date" type="date" class="form-control"
                                               value="{{ old('issue_date', optional($invoice->issue_date)->format('Y-m-d') ?? date('Y-m-d')) }}" required />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="due_date">Due Date</label>
                                        <input id="due_date" name="due_date" type="date" class="form-control"
                                               value="{{ old('due_date', optional($invoice->due_date)->format('Y-m-d') ?? date('Y-m-d')) }}" required />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>&nbsp;</label>
                                        <div>
                                            <a href="{{ route('invoices.index') }}" class="btn btn-default">Back to list</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Items table -->
                                <h5 class="mt-4">Items</h5>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" id="items-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width:4%">#</th>
                                                <th style="width:45%">Description</th>
                                                <th style="width:10%">Qty</th>
                                                <th style="width:15%">Unit Price</th>
                                                <th style="width:15%">Amount</th>
                                                <th style="width:6%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Render items from old input (validation) or from $invoice->items --}}
                                            @php
                                                $renderItems = old('items') ?? ($invoice->items->count() ? $invoice->items->toArray() : []);
                                            @endphp

                                            @if(count($renderItems))
                                                @foreach($renderItems as $i => $it)
                                                    @php
                                                        // support both model->toArray() and old input arrays
                                                        $desc = $it['description'] ?? ($it['description'] ?? '');
                                                        $qty = $it['quantity'] ?? ($it['quantity'] ?? 1);
                                                        $unit = $it['unit_price'] ?? ($it['unit_price'] ?? '0.00');
                                                        $amount = $it['amount'] ?? ($it['amount'] ?? (floatval($qty) * floatval($unit)));
                                                        $itemId = $it['id'] ?? ($it['id'] ?? null);
                                                    @endphp
                                                    <tr class="item-row">
                                                        <td class="text-center drag-handle">{{ $i + 1 }}</td>
                                                        <td>
                                                            <input type="text" name="items[{{ $i }}][description]"
                                                                   class="form-control item-desc" required
                                                                   value="{{ old("items.$i.description", $desc) }}" />
                                                        </td>
                                                        <td>
                                                            <input type="number" min="1"
                                                                   name="items[{{ $i }}][quantity]"
                                                                   class="form-control item-qty"
                                                                   value="{{ old("items.$i.quantity", $qty) }}" required />
                                                        </td>
                                                        <td>
                                                            <input type="number" min="0" step="0.01"
                                                                   name="items[{{ $i }}][unit_price]"
                                                                   class="form-control item-price"
                                                                   value="{{ old("items.$i.unit_price", number_format((float)$unit, 2, '.', '')) }}" required />
                                                        </td>
                                                        <td>
                                                            <input type="text" name="items[{{ $i }}][amount]"
                                                                   class="form-control item-amount text-right"
                                                                   value="{{ old("items.$i.amount", number_format((float)$amount,2,'.','')) }}"
                                                                   readonly />
                                                        </td>
                                                        <td class="text-center">
                                                            @if($itemId)
                                                                <input type="hidden" name="items[{{ $i }}][id]" value="{{ $itemId }}" />
                                                            @endif
                                                            <button type="button" class="btn btn-link text-danger btn-remove-row"
                                                                    title="Remove">✖</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                {{-- Fallback: at least one empty row (shouldn't normally happen for update) --}}
                                                <tr class="item-row">
                                                    <td class="text-center drag-handle">1</td>
                                                    <td>
                                                        <input type="text" name="items[0][description]" class="form-control item-desc" required />
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" name="items[0][quantity]" class="form-control item-qty" value="1" required />
                                                    </td>
                                                    <td>
                                                        <input type="number" min="0" step="0.01" name="items[0][unit_price]" class="form-control item-price" value="0.00" required />
                                                    </td>
                                                    <td>
                                                        <input type="text" name="items[0][amount]" class="form-control item-amount text-right" value="0.00" readonly />
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-link text-danger btn-remove-row" title="Remove">✖</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-2">
                                    <button type="button" id="btn-add-row" class="btn btn-sm btn-primary">+ Add item</button>
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-md-8 -->

                    <div class="col-md-4">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Totals & Options</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="mb-0">Subtotal</label>
                                    <div id="subtotal-display">0.00</div>
                                </div>

                                <div class="form-group">
                                    <label for="tax-mode" class="mb-1">Tax</label>
                                    <div class="input-group">
                                        <select id="tax-mode" class="form-control" style="max-width:150px;">
                                            <option value="amount" {{ old('tax_mode', $invoice->tax_mode ?? '') == 'amount' ? 'selected' : '' }}>Amount</option>
                                            <option value="percent" {{ old('tax_mode', $invoice->tax_mode ?? 'percent') == 'percent' ? 'selected' : '' }}>Percent (%)</option>
                                        </select>
                                        <input id="tax-input" name="tax" type="number" step="0.01"
                                               class="form-control" value="{{ old('tax', number_format((float)($invoice->tax ?? 0),2,'.','')) }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="discount-input" class="mb-1">Discount</label>
                                    <input id="discount-input" name="discount" type="number" step="0.01"
                                           class="form-control" value="{{ old('discount', number_format((float)($invoice->discount ?? 0),2,'.','')) }}" />
                                </div>

                                <hr>

                                <div class="form-group d-flex justify-content-between">
                                    <strong>Total</strong>
                                    <strong id="total-display">0.00</strong>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" id="send_email" name="send_email" value="1"
                                               class="form-check-input" {{ old('send_email', $invoice->send_email ?? false) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="send_email">Send email to customer</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="save_pdf" name="save_pdf" value="1"
                                               class="form-check-input" {{ old('save_pdf', $invoice->save_pdf ?? false) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="save_pdf">Save PDF to storage</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success btn-block" type="submit">Update Invoice</button>
                                </div>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </form>

        </div><!-- /.container-fluid -->
    </section>

    {{-- jQuery (AdminLTE already includes it usually; skip if your layout already loads it) --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script>
        $(function() {
            function formatNumber(n) { return Number(n || 0).toFixed(2); }
            function parseNumber(v){ if (v === undefined || v === null || v === '') return 0; return parseFloat(String(v).replace(/,/g, '')) || 0; }

            function reindexRows() {
                $('#items-table tbody tr.item-row').each(function(i) {
                    $(this).find('input, select, textarea').each(function() {
                        var name = $(this).attr('name');
                        if (!name) return;
                        var newName = name.replace(/^items\[\d+\]/, 'items[' + i + ']');
                        $(this).attr('name', newName);
                    });
                    $(this).find('.drag-handle').first().text(i + 1);
                });
            }

            function recalcRow($row) {
                var qty = parseNumber($row.find('.item-qty').val());
                var unit = parseNumber($row.find('.item-price').val());
                var amount = qty * unit;
                $row.find('.item-amount').val(formatNumber(amount));
            }

            function recalcTotals() {
                var subtotal = 0;
                $('#items-table tbody tr.item-row').each(function() {
                    recalcRow($(this));
                    subtotal += parseNumber($(this).find('.item-amount').val());
                });
                $('#subtotal-display').text(formatNumber(subtotal));

                var taxMode = $('#tax-mode').val();
                var taxInput = parseNumber($('#tax-input').val());
                var taxAmount = (taxMode === 'percent') ? (subtotal * (taxInput / 100)) : taxInput;

                var discount = parseNumber($('#discount-input').val());
                var total = subtotal + taxAmount - discount;

                $('#total-display').text(formatNumber(total >= 0 ? total : 0));
            }

            function addRow(defaults) {
                defaults = defaults || {};
                var idx = $('#items-table tbody tr.item-row').length;
                var idPart = defaults.id ? '<input type="hidden" name="items[' + idx + '][id]" value="' + defaults.id + '">' : '';
                var amountVal = (defaults.amount !== undefined) ? Number(defaults.amount).toFixed(2) : '0.00';
                var $tr = $('<tr class="item-row">\
          <td class="text-center drag-handle">' + (idx + 1) + '</td>\
          <td><input type="text" name="items[' + idx + '][description]" class="form-control item-desc" required value="' + (defaults.description || '') + '"></td>\
          <td><input type="number" min="1" name="items[' + idx + '][quantity]" class="form-control item-qty" value="' + (defaults.quantity || 1) + '" required></td>\
          <td><input type="number" min="0" step="0.01" name="items[' + idx + '][unit_price]" class="form-control item-price" value="' + (defaults.unit_price !== undefined ? Number(defaults.unit_price).toFixed(2) : '0.00') + '" required></td>\
          <td><input type="text" name="items[' + idx + '][amount]" class="form-control item-amount text-right" value="' + amountVal + '" readonly></td>\
          <td class="text-center">' + idPart + '<button type="button" class="btn btn-link text-danger btn-remove-row">✖</button></td>\
        </tr>');
                $('#items-table tbody').append($tr);
                reindexRows();
                recalcTotals();
            }

            // remove row handler (tracks deleted existing items)
            $(document).on('click', '.btn-remove-row', function() {
                var $tr = $(this).closest('tr');
                var $idInput = $tr.find('input[type="hidden"][name$="[id]"]');
                if ($idInput.length) {
                    var itemId = $idInput.val();
                    if (itemId) {
                        $('<input>').attr({ type: 'hidden', name: 'deleted_items[]', value: itemId }).appendTo('#deleted-items-container');
                    }
                }
                $tr.remove();
                reindexRows();
                recalcTotals();

                if ($('#items-table tbody tr.item-row').length === 0) {
                    addRow();
                }
            });

            // change handlers
            $(document).on('input change', '#items-table tbody .item-qty, #items-table tbody .item-price', function() {
                var $row = $(this).closest('tr');
                recalcRow($row);
                recalcTotals();
            });

            $(document).on('input change', '#tax-input, #tax-mode, #discount-input', function() {
                recalcTotals();
            });

            $('#btn-add-row').on('click', function() { addRow(); });

            $('#invoice-form').on('submit', function(e) {
                reindexRows();
                recalcTotals();

                var validRows = 0;
                $('#items-table tbody tr.item-row').each(function() {
                    if ($(this).find('.item-desc').val()) validRows++;
                });
                if (validRows === 0) {
                    alert('Please add at least one item.');
                    e.preventDefault();
                    return false;
                }

                // ensure subtotal/total posted
                $(this).find('input[name="subtotal"], input[name="total"]').remove();
                $('<input>').attr({ type: 'hidden', name: 'subtotal', value: $('#subtotal-display').text() }).appendTo($(this));
                $('<input>').attr({ type: 'hidden', name: 'total', value: $('#total-display').text() }).appendTo($(this));
                return true;
            });

            // initialize totals when page loads
            recalcTotals();
        });
    </script>

@endsection
