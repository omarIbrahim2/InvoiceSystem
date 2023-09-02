<?php

namespace App\Src\Interfaces;

use App\Src\Entities\InvoiceEntity;

interface InvoiceRepoInterface{

     public function create(InvoiceEntity $invoice);

     public function getInvoices(...$attrs);

     public function find($InvoiceId);

     public function AddProduct($InvoiceId , $ProductId , $Quantity);

     public function RemoveProduct($InvoiceId , $ProductId);

     public function updateProductQuantity($InvoiceId , $ProductId , $Quantity);
}