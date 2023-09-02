@extends('layout')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center">

        @include("inc.message" , ['alertClass' => 'alert-success'])


    </div>

    @include('inc.tableHeader' , ['headerName'=> 'الفواتير' , "route" => 'Invoices-create' , 'linkName' => 'اضافة فاتورة'])


    <table class="table mt-4">

        <thead class="table-light">
            <th>#</th>
            <th>تاريخ الفاتورة</th>
            <th>العميل</th>
            <th>تفاصيل</th>
        </thead>
        <tbody>

            @foreach ($Invoices as $Invoice )

            <tr>
                <td>{{$loop->iteration}}</td>
                <td class="w-25">{{$Invoice->date}}</td>
                <td>{{$Invoice->customer->company_name}}</td>
                <td><a href="{{route('single-invoice' , $Invoice->id)}}">
                        <i class="fa-solid fa-eye"></i>
                    </a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
