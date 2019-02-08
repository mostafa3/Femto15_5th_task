@extends('layouts.dashboard')


@section('title')
  <title>{{$inventory->name}}</title>
@endsection


@section('css')
  <link href="{{asset('css/show.css')}}" rel="stylesheet">
@endsection

@section('content')

  @include('inc.sidebar')


  @include('inc.messages')





  <div class="container">

    <div class="row">
      <div class="col-lg-4">
        <i class="fas fa-warehouse"></i>
      </div>
      <div class="col-lg-8">
        <h2>{{$inventory->name}}</h2>

        <div id="inventory-information">




            <button type="button" class="btn btn-link"><a href="{{action('InventoryController@edit',['inventory'=>$inventory->id])}}">Edit</a></button>




        </div>
      </div>
    </div>

    <!-- end of main container -->
  </div>

@endsection
