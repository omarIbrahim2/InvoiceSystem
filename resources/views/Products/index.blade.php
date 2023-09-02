@extends('layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">

      @include("inc.message" , ['alertClass' => 'alert-success'])
    

    </div>
     
     @include('inc.tableHeader' , ['headerName'=> 'المنتجات' , "route" => 'Products-create' , 'linkName' => 'اضافة منتج'])
   

    
    <table class="table mt-4">
        <thead class="table-light">
            <th>#</th>
            <th>الاسم</th>
             <th>السعر</th>
        </thead>
        <tbody>
           
            @foreach ($Products as $product )
                
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td class="w-25">{{$product->price}}  LE</td>
        </tr>
            @endforeach

        </tbody>
      </table>
      <div class="d-flex justify-content-between">
         {!!$Products->links()!!}
      </div>

</div>
@endsection