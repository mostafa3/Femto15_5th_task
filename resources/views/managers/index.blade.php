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

@can('create','App\User')
  <p class="lg">
    Here is our Managers so we can edit or delete or <button class="btn btn-link"><a href="{{action('InventoryManagerController@create')}}">Add New Manager</a></button>
  </p>
@endcan

    @if($managers->count())

            <table class="table table-hover">
              <thead>
                <th>NAME</th>
                <th>Email</th>
                <th>Inventory</th>
                <th></th>
              </thead>
              <tbody>
  @foreach($managers as $manager)
    <tr>
      <td>{{$manager->name}}</td>
      <td>{{$manager->email}}</td>
      <td>{{ $manager->inventory ? $manager->inventory->name : ''}}</td>

      <td><a href="{{action('InventoryManagerController@show',['inventory_manager'=>$manager->id])}}"><i class="fas fa-external-link-square-alt icon-large"></i></a></td>
    </tr>


  @endforeach

    </tbody>
    </table>


  @else

    NO Managers To Show !

  @endif

  </div>




@endsection
