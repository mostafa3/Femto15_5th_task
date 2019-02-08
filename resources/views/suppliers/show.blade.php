@extends('layouts.dashboard')


@section('title')
  <title>{{$supplier->name}}</title>
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
        <h2>{{$supplier->name}}</h2>

        <div id="inventory-information">
          <p>
            <span class="inf-title">Email</span><i class="fas fa-angle-right"></i><span>{{$supplier->email}}</span>
          </p>
          <p>
            <span class="inf-title">Phone</span><i class="fas fa-angle-right"></i><span>{{$supplier->phone}}</span>
          </p>
          <p>
            <span class="inf-title">Inventory</span><i class="fas fa-angle-right"></i><span>{{$supplier->inventory->name}}</span>
          </p>
          <p>
            <span class="inf-title">Created At</span><i class="fas fa-angle-right"></i><span>{{$supplier->created_at}}</span>
          </p>
          @if($supplier->information)
            <p>
              <span class="inf-title">Information</span><i class="fas fa-angle-right"></i><span>{{$supplier->information}}</span>
            </p>
          @endif

          @can('update',$supplier)
            <button type="button" class="btn btn-link"><a href="{{action('SupplierController@edit',['$supplier'=>$supplier->id])}}">Edit</a></button>
          @endcan

          @if($supplier->items->count())
            <p>
              <h4 class="text-center">Items</h4>
            </p>


            <ul class="">
              @foreach($supplier->items->all() as $item)
                  <li>
                    {{$item->name}}
                  </li>
              @endforeach
            </ul>


          @endif
        <!-- Items he supply -->




        </div>
      </div>
    </div>

    <!-- end of main container -->
  </div>

@endsection
