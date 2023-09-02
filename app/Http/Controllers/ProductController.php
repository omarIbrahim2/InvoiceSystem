<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddReq;
use App\Src\Entities\ProductEntity;
use App\Src\Interfaces\ProductRepoInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;
    public function __construct(ProductRepoInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index(){
          
       $Products  = $this->productRepo->getProducts( 5 ,['id' , 'name' , 'price']);

        return view('Products.index')->with(['Products' => $Products]);
    }


    public function create(){
        return view('Products.create');
    }

    public function store(ProductAddReq $request){

         $validatedReq = $request->validated();


         $product = $this->productRepo->create(new ProductEntity($validatedReq));

         return redirect()->route('Products')->with('success' , "تم اضافة المنتج بنجاح");
    }
}
