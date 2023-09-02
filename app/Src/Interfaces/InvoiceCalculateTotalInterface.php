<?php

namespace App\Src\Interfaces;

use App\Models\Invoice;

interface InvoiceCalculateTotalInterface{
    public function Calculate(Invoice $invoice);
}