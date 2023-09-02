@extends('layout')

@section('content')
<div class="container w-75 border p-4 shadow-sm ">
   @include('inc.createFormHeader' , ['headTitle' => 'اضافة عميل'])
    <form method="POST"  action="{{route('Customers-store')}}">
        @csrf
        <div class="mb-3">
          
            <label for="formGroupExampleInput" class="form-label">اسم الشركة</label>
            <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control" id="formGroupExampleInput" placeholder="اسم الشركة">
            @error('company_name')
            <p class="text-danger">{{$message}}</p>
           @enderror
          </div>
          <div class="mb-3">
           
            <label for="formGroupExampleInput2" class="form-label">البريد الالكتروني</label>
            <input type="email" value="{{old('email')}}" class="form-control" name="email" id="formGroupExampleInput2"  placeholder="البريد الالكتروني">
            @error('email')
            <p class="text-danger">{{$message}}</p>
             @enderror
          </div>
          <div class="mb-3">
           
            <label for="formGroupExampleInput3" class="form-label">رقم الهاتف</label>
            <input type="text" value="{{old('phone')}}" name="phone" class="form-control" id="formGroupExampleInput3" placeholder="رقم الهاتف">
            @error('phone')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-3">
           
            <label for="formGroupExampleInput4" class="form-label">العنوان</label>
            <input type="text" value="{{old('address')}}" name="address" class="form-control" id="formGroupExampleInput4" placeholder="العنوان">
            @error('address')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-3">
           
            <label for="formGroupExampleInput5" class="form-label">الدولة</label>
            <select name="country" id="formGroupExampleInput5" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>الدولة</option>
                <option value="Egypt" @if(old('country') == 'Egypt') {{'selected'}}   @endif>مصر</option>
                <option value="America" @if(old('country') == 'America') {{'selected'}}   @endif>امريكا</option>
                <option value="Tunsia" @if(old('country') == 'Tunsia') {{'selected'}}   @endif>تونس</option>
                <option value="Algeria" @if(old('country') == 'Algeria') {{'selected'}}   @endif>الجزائر</option>
                <option value="Germany" @if(old('country') == 'Germany') {{'selected'}}   @endif>المانيا</option>
                <option value="Italy" @if(old('country') == 'Italy') {{'selected'}}   @endif>ايطاليا</option>
              </select>
            @error('country')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-3">
           
            <label for="formGroupExampleInput6" class="form-label">المدينة</label>
            <input type="text" name="city" class="form-control" id="formGroupExampleInput6" placeholder="المدينة">
            @error('city')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>


          <div class="mb-3">
           
            <label for="formGroupExampleInput8" class="form-label">المركز</label>
            <input type="text" name="state" class="form-control" id="formGroupExampleInput8" placeholder="المركز">
            @error('state')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-3">
           
            <label for="formGroupExampleInput7" class="form-label">الرقم البريدي</label>
            <input type="text" name="postal_code" class="form-control" id="formGroupExampleInput7" placeholder="الرقم البريدي">
            @error('postal_code')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-3 w-50">
            <button class="btn btn-secondary" type="submit">اضافة</button>
          </div>
    </form>

</div>
@endsection