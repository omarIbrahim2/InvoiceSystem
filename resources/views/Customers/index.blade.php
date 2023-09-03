@extends('layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">

      @include("inc.message" , ['alertClass' => 'alert-success'])
    

    </div>
     
     @include('inc.tableHeader' , ['headerName'=> 'العملاء' , "route" => 'Customers-create' , 'linkName' => 'اضافة عميل'])
   

    
    <table class="table mt-4">
        <thead class="table-light">
            <th>#</th>
            <th>اسم الشركة</th>
             <th>البريد الالكتروني</th>
        </thead>
        <tbody>
           
            @foreach ($Customers as $customer )
                
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$customer->company_name}}</td>
            <td class="w-25">{{$customer->email}}</td>
        </tr>
            @endforeach

        </tbody>

        <div class="d-flex justify-content-center">
            {!! $Customers->links() !!}
        </div>
      </table>
  

</div>
@endsection