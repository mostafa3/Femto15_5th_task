@extends('layouts.dashboard')


@section('title')
  <title>Items</title>
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
    Here is our Items so we can edit or delete or <button class="btn btn-link"><a href="{{action('ItemController@create')}}">Add New Item</a></button>
  </p>


    @if($items->count())

            <table class="table table-hover">
              <thead>
                <th>NAME</th>
                <th>Supplier</th>
                <th>Unit</th>
                
                <th></th>
              </thead>
              <tbody>
        @foreach($items as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->supplier->name}}</td>
            <td>{{$item->unit}}</td>


            <td><a href="{{action('ItemController@show',['item'=>$item->id])}}}"><i class="fas fa-external-link-square-alt icon-large"></i></a></td>
          </tr>


        @endforeach

    </tbody>
    </table>



  @else

    NO Items To Show !

  @endif

  </div>




@endsection
