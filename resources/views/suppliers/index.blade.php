@extends('layouts.dashboard')


@section('title')
  <title>Inventories</title>
@endsection


@section('content')
@include('inc.sidebar')

<div class="content">
<div class="row justify-content-center">
  <div class="col-lg-8 ">
    @include('inc.messages')
  </div>
</div>


  <p class="lg">
    Here is our Suppliers so we can edit or delete or <button class="btn btn-link"><a href="{{action('SupplierController@create')}}">Add New Supplier</a></button>
  </p>


    @if($suppliers->count())

            <table class="table table-hover">
              <thead>
                <th>NAME</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th></th>
              </thead>
              <tbody>
  @foreach($suppliers as $supplier)
    <tr>
      <td>{{$supplier->name}}</td>
      <td>{{$supplier->email}}</td>
      <td>{{$supplier->phone}}</td>
      <td>{{$supplier->created_at}}</td>

      <td><a href="{{action('SupplierController@show',['supplier'=>$supplier->id])}}"><i class="fas fa-external-link-square-alt icon-large"></i></a></td>
    </tr>


  @endforeach

    </tbody>
    </table>



  @else

    NO Suppliers To Show !

  @endif

  </div>




@endsection
