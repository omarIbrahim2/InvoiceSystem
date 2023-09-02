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

          $totalwithTax = $total * $invoice->tax;
    
          $total =  abs(($totalwithTax * $invoice->discount) - $totalwithTax);  


          return $total;      
    }
}