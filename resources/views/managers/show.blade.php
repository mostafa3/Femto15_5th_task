@extends('layouts.dashboard')


@section('title')
  <title>{{$inventory_manager->name}}</title>
@endsection


@section('css')
  <link href="{{asset('css/show.css')}}" rel="stylesheet">
@endsection

@section('content')

  @include('inc.sidebar')






  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-8 ">
        @include('inc.messages')
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <i class="fas fa-user-tie"></i>
      </div>
      <div class="col-lg-8">
        <h2>{{$inventory_manager->name}}</h2>

        <div id="inventory-information">
          <p>
            <span class="inf-title">Email</span><i class="fas fa-angle-right"></i><span>{{$inventory_manager->email}}</span>
          </p>
          @if($inventory_manager->inventory)
          <p>
            <span class="inf-title">Inventory</span><i class="fas fa-angle-right"></i><span><a href="{{action('InventoryController@show',['inventory'=>$inventory_manager->inventory->id])}}">{{$inventory_manager->inventory->name}}</a></span>
          </p>
          @endif


          <button type="button" class="btn btn-link"><a href="{{action('InventoryManagerController@edit',['inventory_manager'=>$inventory_manager->id])}}">Edit</a></button>

        </div>
      </div>
    </div>

    <!-- end of main container -->
  </div>

@endsection
