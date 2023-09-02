@extends('layout')

@section('content')
<div class="container w-75 border p-4 shadow-sm ">
   
     @include('inc.createFormHeader' , ['headTitle' => 'اضافة منتج'])
    <form method="POST"  action="{{route('Products-store')}}">
        @csrf
        <div class="mb-3">
          
            <label for="formGroupExampleInput" class="form-label">الاسم</label>
            <input type="text" name="name" value="{{old('name')}}"  class="form-control" id="formGroupExampleInput" placeholder="اسم المنتج">
            @error('name')
            <p class="text-danger">{{$message}}</p>
           @enderror
          </div>
          <div class="mb-3">
           
            <label for="formGroupExampleInput2" class="form-label">الوصف</label>
            <textarea class="form-control" name="desc" id="formGroupExampleInput2" cols="30" rows="10" placeholder="وصف المنتج">{{old('desc')}}</textarea>
            @error('desc')
            <p class="text-danger">{{$message}}</p>
             @enderror
          </div>
          <div class="mb-3">
           
            <label for="formGroupExampleInput3" class="form-label">السعر</label>
            <input type="number" value="{{old('price')}}" name="price" class="form-control" id="formGroupExampleInput3" placeholder="سعر المنتج">
            @error('price')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-3 w-50">
            <button class="btn btn-secondary" type="submit">اضافة</button>
          </div>
    </form>

</div>
@endsection