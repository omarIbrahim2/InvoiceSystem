<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAddReq;
use App\Src\Entities\CustomerEntity;
use App\Src\Interfaces\CustomerRepoInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $CustomerRepoInterface;
    public function __construct(CustomerRepoInterface $CustomerRepoInterface){
        $this->CustomerRepoInterface = $CustomerRepoInterface;
    }

    public function index(){
        $Customers = $this->CustomerRepoInterface->getCustomers(['id' , 'company_name' , 'email']);
        return view('Customers.index')->with(['Customers' => $Customers]);
    } 
    public function create(){
        return view('Customers.create');
    }

    public function store(CustomerAddReq $request){
        
       $validatedReq = $request->validated();
  

       $customer = $this->CustomerRepoInterface->create(new CustomerEntity($validatedReq));

       return redirect()->route('Customers')->with('success' , "تم اضافةعميل بنجاح");


    }
}
