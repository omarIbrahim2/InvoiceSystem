@extends('layout')


@section('content')

@include('inc.createFormHeader' , ['headTitle' => 'اضافة فاتورة'])

<div class="container w-75 border p-4 shadow-sm ">
<form class="row g-3 mb-3" method="POST" action="{{route('Invoices-store')}}">

   @csrf


   <div class="col-md-4">
    <label for="dateInput" class="form-label">تاريخ الفاتورة</label>
    <input type="date" class="form-control" name="date" id="dateInput" placeholder="تاريخ الفاتورة">
    @error('date')
    <p class="text-danger">{{$message}}</p>
    @enderror
   </div>

   <div class="col-md-4">
    <label for="taxInput" class="form-label">قيمة الضريبة</label>
    <input type="float" class="form-control" value="{{old('tax')}}" name="tax" id="taxInput" placeholder="قيمة الضريبة">
    @error('tax')
    <p class="text-danger">{{$message}}</p>
    @enderror
   </div>

   <div class="col-md-4">
    <label for="discInput" class="form-label">قيمة الخصم</label>
    <input type="float" class="form-control" value="{{old('discount')}}" name="discount" id="discInput" placeholder="قيمة الخصم">
    @error('discount')
    <p class="text-danger">{{$message}}</p>
    @enderror
   </div>

   <div class="col-md-12 mb-3">
    <label for="cusomerInput" class="form-label">العميل</label>
    <select name="customer_id" id="cusomerInput" class="form-select form-select-sm" aria-label=".form-select-sm example">
            
        <option selected>العميل</option>

        @foreach ($Customers as $customer )
             <option value="{{$customer->id}}" @if (old('customer_id') ==$customer->id)
                {{'selected'}}
             @endif>{{$customer->company_name}}</option>
        @endforeach
    </select>
    @error('customer_id')
    <p class="text-danger">{{$message}}</p>
    @enderror
   </div>


   <div class="col-md-12 mb-3">
      
    <label for="notesInput" class="form-label">ملاحظات</label>
    <textarea name="notes" id="notesInput" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
    @error('notes')
    <p class="text-danger">{{$message}}</p>
    @enderror
   </div>

   <div class="mb-3 w-50">
    <button class="btn btn-secondary" type="submit">اضافة</button>
  </div>

</form>
</div>
    
@endsection