<?php

namespace App\Src\Repositories;

use App\Models\Invoice;
use App\Src\Entities\InvoiceEntity;
use App\Src\Interfaces\InvoiceRepoInterface;

class InvoiceRepo implements InvoiceRepoInterface{


    public function create(InvoiceEntity $invoice ){

        return Invoice::create($invoice->getAttributes());
    }

    public function getInvoices(...$attrs){

       return Invoice::with(['customer:id,company_name'])->select(...$attrs)->paginate(5);
    }

    public function find($InvoiceId){

        return Invoice::with(['products:id,name,price,desc' , 'customer:id,company_name'])->findOrFail($InvoiceId , "*");
    }

    public function AddProduct($InvoiceId , $ProductId , $Quantity ){

        $invoice = Invoice::with(['products:id,price'])->findOrFail($InvoiceId , ["*"] );

        $invoice->products()->attach([$ProductId] , ['quantity' => $Quantity]);

        return $invoice->fresh(['products']);

        
    }

    public function RemoveProduct($InvoiceId, $ProductId){

        $invoice = Invoice::with(['products:id,price'])->findOrFail($InvoiceId , ["*"] );

        $invoice->products()->detach([$ProductId]);

        return $invoice->fresh(['products']);
    }


    public function updateProductQuantity($InvoiceId , $ProductId , $Quantity){

        $invoice = Invoice::with(['products:id,price'])->findOrFail($InvoiceId , ["*"] );

        $invoice->products()->updateExistingPivot(
            $ProductId,
            ['quantity' => $Quantity]
        );
        return $invoice->fresh(['products']);
    }
}