@extends('layout')


@section('content')

<div class="container">
     
    @include("inc.message")
   <div class="d-flex justify-content-center mb-5">
      <div class="text-center">
         <h3>الفاتورة رقم : {{$Invoice->id}}</h3>
      </div>
    </div> 
  <div class="row w-100 justify-content-center">
     
     <div class="col-md-3">

         <div>
            <p><strong>تاريخ الفاتورة</strong>  : {{$Invoice->date}}</p>
         </div>

     </div>

     <div class="col-md-3">

        <div>
           <p> <strong>اسم العميل</strong>  : {{$Invoice->customer->company_name}}</p>
        </div>

    </div>
     
  </div>

  <div class="d-flex justify-content-between mt-5">
    <div class="text-center">
       <h3>المنتجات</h3>
    </div>

    <div class="buttomCreate">
        <button class="btn btn-secondary " data-bs-toggle="modal" data-inid={{$Invoice->id}}  data-bs-target="#addProdInv">اضافة منتج</button>
    </div>
  </div> 

    
  <table class="table table-bordered mt-4">

    <thead class="table-light">
        <th>الرقم</th>
        <th>الكمية</th>
        <th>وصف المنتج</th>
        <th>سعر الوحدة</th>
        <th> اجمالي السعر  </th>
        <th></th>
    </thead>
    <tbody>

         @foreach ($Invoice->products as $product )

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td class="desc-col"> {{Str::limit($product->desc , 50) }}
            
              <span class="page-up" data-bs-toggle="modal"  data-bs-target="#prodModal" data-dec="{{$product->desc}}" >
                <i class="fa-solid fa-file-lines"></i>
              </span>

            </td>
            <td>{{$product->price}}</td>
            <td>{{$product->price * $product->pivot->quantity}}</td>
            <td>
            <div class="d-flex justify-content-center">
                <div class="edit-icon">
                    
                    <button id="editBtn" data-prodId="{{$product->id}}"  data-quant="{{$product->pivot->quantity}}" data-bs-target="#updateQuantity" data-bs-toggle="modal">
                      <i class="fa-solid fa-pen-to-square" ></i>
                    </button>
                    
                </div>

                <div class="delete-icon">
                    <form method="POST" action="{{route('Invoice-remove-product')}}">
                          @csrf
                          @method("DELETE")
                          <input type="hidden" name="product_id" value="{{$product->id}}">
                          <input type="hidden"  name="invoice_id" value="{{$Invoice->id}}">
                          
                          <button type="submit">
                            <i class="fa-solid fa-xmark fa-lg"></i>
                        </button>
                    </form>
                    
                    
                </div>

            </div>
          </td>
        </tr>
         @endforeach

    </tbody>
   
</table>
<div class="row">
     <div class="col-md-4 totalInvoice">
        
         <p>قيمة الخصم : {{$Invoice->discount}}</p>
        
     </div>

     <div class="col-md-4 totalInvoice">

         <p>قيمة الضريبة : {{$Invoice->tax}}</p>
     </div>

     <div class="col-md-4 totalInvoice">
        <p>المجموع : {{$Invoice->total}}</p>
    </div>

</div>

<div class="modal" id="prodModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">وصف المنتج</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="width: 300px">
          <p id="dec-target"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="addProdInv" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">اضافة منتج</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="width: 300px">
               <form method="POST" action="{{route('Invoices-add-product')}}">
                       @csrf  
                     <input name="invoice_id" type="hidden" value={{$Invoice->id}}>
                   <div class="mb-3">
                        <label for="selctProduct" class="form-label">اختر منتج</label>
                       <select name="product_id" id="selctProduct" class="form-select">
                           <option selected>المنتج</option>

                           @foreach ($Products as $product )
                               <option value={{$product->id}}>{{$product->name}}</option>
                           @endforeach

                       </select>

                   </div>

                   <div class="mb-3">
                      
                      <label for="quant" class="form-label">الكمية</label>
                      <input type="number" id="quant" name="quantity" class="form-control">
                   </div>

                   <div class="w-50">
                    <button class="btn btn-secondary" type="submit">اضافة</button>
                  </div>
               </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal" id="updateQuantity" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">تعديل الكمية</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="width: 300px">
             <form method="POST" action="{{route('Invoice-update-quantity')}}">
                     @csrf  
                   <input name="invoice_id" type="hidden" value="{{$Invoice->id}}">
                     
                   <input type="hidden" id="inputProdId" name="product_id">

                 <div class="mb-3">
                    
                    <label for="quantEdit" class="form-label">الكمية</label>
                    <input type="number" id="quantEdit" name="quantity" class="form-control">
                 </div>

                 <div class="w-50">
                  <button class="btn btn-secondary" type="submit">تعديل</button>
                </div>
             </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
    
@endsection