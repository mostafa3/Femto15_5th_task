@extends('layouts.dashboard')


@section('title')
  <title>Transactions</title>
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
    Here is our Transactions so we can <button class="btn btn-link"><a href="{{action('TransactionController@create')}}">Add New Transaction</a></button>
  </p>


    @if($transactions->count())

            <table class="table table-hover">
              <thead>
                <th>Item</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Notes</th>
                <th>Date</th>
              </thead>
              <tbody>
  @foreach($transactions as $transaction)
    <tr>
      <td>{{$transaction->item->name}}</td>
      <td>{{$transaction->type}}</td>
      <td>{{$transaction->amount}} {{$transaction->item->unit}}</td>
      <td>{{$transaction->notes}}</td>
      <td>{{$transaction->created_at}}</td>

    </tr>


  @endforeach

    </tbody>
    </table>



  @else

    NO Transactions To Show !

  @endif

  </div>




@endsection
