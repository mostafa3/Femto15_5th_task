@extends('layouts.dashboard')


@section('title')
  <title>{{$item->name}}</title>
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
        <i class="fas fa-box"></i>
      </div>
      <div class="col-lg-8">
        <h2>{{$item->name}}</h2>

        <div id="inventory-information">
          <p>
            <span class="inf-title">Measurement Unit</span><i class="fas fa-angle-right"></i><span>{{$item->unit}}</span>
          </p>
          <p>
            <span class="inf-title">Supplier</span><i class="fas fa-angle-right"></i><span><a href="{{action('SupplierController@show',['supplier'=>$item->supplier->id])}}">{{$item->supplier->name}}</a></span>
          </p>






            <button type="button" class="btn btn-link"><a href="{{action('ItemController@edit',['item'=>$item->id])}}">Edit</a></button>

        </div>
      </div>
    </div>

  

    <!-- end of main container -->
  </div>

@endsection
