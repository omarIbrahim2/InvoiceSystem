<?php

namespace App\Src\Utilities;
use App\Models\Invoice;
use App\Src\Interfaces\InvoiceCalculateTotalInterface;



class InvoiceCalculations implements InvoiceCalculateTotalInterface{


    public function Calculate(Invoice $invoice){
          $total = 0;
          foreach ($invoice->products as $product) {
              
              $total+=$product->price * $product->pivot->quantity;
          }

          if($invoice->tax > 0){
              $total *= $invoice->tax;
          }

          $totalWithDiscountPercentage = $total * $invoice->discount;
    
          return  abs($total - $totalWithDiscountPercentage);      
    }
}