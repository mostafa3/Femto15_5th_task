@extends('layouts.dashboard')


@section('title')
  <title>New Transaction</title>
@endsection

@section('content')

  @include('inc.sidebar')





    <div class='container'>
      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('TransactionController@index')}}">Transactions</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add New Transaction</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('TransactionController@store')}}" method="POST">

      @csrf
      <!-- Item Section -->
      <div class="form-group row">
          <label for="item" class="col-sm-2 col-form-label">Item</label>
          <div class="col-sm-10">
              <select class="custom-select {{ $errors->has('item') ? ' is-invalid' : '' }}" id="item" name="item" required>
                @foreach($items as $item)
                  <option value="{{$item->id}}">{{$item->name}} - {{$item->available()}} {{$item->unit}}</option>
                 @endforeach
              </select>
              @if ($errors->has('item'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('item') }}</strong>
                  </span>
              @endif
          </div>
      </div>

         <!-- Type Section -->
         <div class="form-group row">
             <label for="type" class="col-sm-2 col-form-label">Type</label>
             <div class="col-sm-10">
                 <select class="custom-select {{ $errors->has('type') ? ' is-invalid' : '' }}" id="type" name="type" required>
                     <option value="add">Add</option>
                     <option value="consume">Consume</option>
                 </select>
                 @if ($errors->has('type'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('type') }}</strong>
                     </span>
                 @endif
             </div>
         </div>

         <!-- Amount Section -->
         <div class="form-group row">
           <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
              <input type="number" id="amount" name="amount" value="{{ old('amount') ?? $item->amount }}" placeholder="Amount" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" min="1" required/>
              @if ($errors->has('amount'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('amount') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <!-- Notes Section -->
          <div class="form-group row">
            <label for="notes" class="col-sm-2 col-form-label">Additional Notes</label>
             <div class="col-sm-10">
               <textarea id="notes" name="notes" placeholder="notes" class="form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}" >{{old('notes')}}</textarea>
               @if ($errors->has('notes'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('notes') }}</strong>
                   </span>
               @endif
             </div>
           </div>




         <button type="submit" class="btn btn-primary">Commit Transaction</button>






    </form>




  </div> <!-- Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

@endsection
