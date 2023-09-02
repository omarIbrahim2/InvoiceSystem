<?php

namespace App\Http\Controllers;

use App\Events\ProductAddedToEvent;
use App\Http\Requests\AddProductToInvoiceReq;
use App\Http\Requests\InvoiceAddReq;
use App\Http\Requests\RemoveProductInvoiceReq;
use App\Src\Entities\InvoiceEntity;
use App\Src\Interfaces\CustomerRepoInterface;
use App\Src\Interfaces\InvoiceCalculateTotalInterface;
use App\Src\Interfaces\InvoiceRepoInterface;
use App\Src\Interfaces\ProductRepoInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $InvoiceRepoInterface;
    private $CustomerRepoInterface;

    private $ProductRepoInterface;

    public function __construct(InvoiceRepoInterface $invoiceRepoInterface , CustomerRepoInterface $customerRepoInterface , ProductRepoInterface $productRepoInterface ){
          
        $this->InvoiceRepoInterface = $invoiceRepoInterface;
        $this->CustomerRepoInterface = $customerRepoInterface;
        $this->ProductRepoInterface = $productRepoInterface;
    }

    public function index(){

        $Invoices = $this->InvoiceRepoInterface->getInvoices(['id' , 'date' , 'customer_id']);

        return view('Invoices.index')->with(['Invoices' => $Invoices]);
    }


    public function create(){
         
        $Customers =  $this->CustomerRepoInterface->getCustomers( 0,['id' , 'company_name']);
        return view('Invoices.create')->with(['Customers' => $Customers]);
    }

    public function store(InvoiceAddReq $request){
       $validatedReq =  $request->validated();

        $Invoice= $this->InvoiceRepoInterface->create(new InvoiceEntity($validatedReq));

        return redirect()->route('Invoices')->with('success' , 'تم اضافة فاتورة بنجاح');
    }


    public function show($InvoiceId){

      $Invoice = $this->InvoiceRepoInterface->find($InvoiceId);
      $Products = $this->ProductRepoInterface->getProducts( 0 ,['id' , 'name'] );
      return view('Invoices.show')->with(['Invoice' => $Invoice , 'Products' => $Products]);

    }

    public function AddProduct(AddProductToInvoiceReq $request){

       $validatedReq = $request->validated();

       $Invoice = $this->InvoiceRepoInterface->AddProduct($validatedReq['invoice_id'] , $validatedReq['product_id'] , $validatedReq['quantity']);
    
       event(new ProductAddedToEvent(app()->make(InvoiceCalculateTotalInterface::class) ,$Invoice));

       return back()->with('success' , "تم اضافة المنتج بنجاح");



    }

    public function DeleteProduct(RemoveProductInvoiceReq $request){

        $validatedReq =  $request->validated();


        $invoice = $this->InvoiceRepoInterface->RemoveProduct( $validatedReq['invoice_id'] , $validatedReq['product_id']);

        event(new ProductAddedToEvent(app()->make(InvoiceCalculateTotalInterface::class) ,$invoice));

        return back()->with('danger' , 'تم حذف المنتح من الفاتورة بنجاح');


    }

    public function updateQuantity(AddProductToInvoiceReq $request){
      $validatedReq =   $request->validated();
      
      $invoice =  $this->InvoiceRepoInterface->updateProductQuantity($validatedReq['invoice_id'] , $validatedReq['product_id'] , $validatedReq['quantity']);

      event(new ProductAddedToEvent(app()->make(InvoiceCalculateTotalInterface::class) ,$invoice));

      return back()->with('success' , 'تم تعديل الكمية للمنتج بنجاح' );


    }
}
