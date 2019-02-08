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
    Here is our Inventories so we can edit or delete or <button class="btn btn-link"><a href="{{action('InventoryController@create')}}">Add New Inventory</a></button>
  </p>


    @if($inventories->count())

            <table class="table table-hover">
              <thead>
                <th>NAME</th>
                <th></th>
              </thead>
              <tbody>
  @foreach($inventories as $inventory)
    <tr>
      <td>{{$inventory->name}}</td>
      <td><a href="{{action('InventoryController@show',['inventory'=>$inventory->id])}}"><i class="fas fa-external-link-square-alt icon-large"></i></a></td>
    </tr>


  @endforeach

    </tbody>
    </table>



  @else

    NO Inventories To Show !

  @endif

  </div>




@endsection
