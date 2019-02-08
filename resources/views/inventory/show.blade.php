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
          <p>
            <span class="inf-title">Manager</span>
            <i class="fas fa-angle-right"></i>
            @if($inventory->manager)
              <span><a href="{{action('InventoryManagerController@show',['inventory_manager'=>$inventory->manager->id])}}">{{$inventory->manager->name ?? ''}}</a></span>
            @endif
          </p>


          @can('update','App\Inventory')
            <button type="button" class="btn btn-link"><a href="{{action('InventoryController@edit',['inventory'=>$inventory->id])}}">Edit</a></button>
          @endcan

          @if($inventory->suppliers->count())
            <p>
              <h4 class="text-center">Suppliers</h4>
            </p>


            <ul class="">
              @foreach($inventory->suppliers->all() as $supplier)
                  <li>
                    <a href="{{action('SupplierController@show',['supplier'=>$supplier->id])}}"> {{$supplier->name}} - {{$supplier->phone}} </a>
                  </li>
              @endforeach
            </ul>


          @endif

          @if($inventory->suppliers->count())
            <p>
              <h4 class="text-center">Items</h4>
            </p>


            <ul class="">
              @foreach($inventory->items->all() as $item)
                  <li>
                    <a href="{{action('ItemController@show',['item'=>$item->id])}}"> {{$item->name}} - {{$item->available()}} {{$item->unit}} </a>
                  </li>
              @endforeach
            </ul>


          @endif



        </div>
      </div>
    </div>

    <!-- end of main container -->
  </div>

@endsection
