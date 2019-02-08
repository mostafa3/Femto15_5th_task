@extends('layouts.dashboard')


@section('title')
  <title>New Item</title>
@endsection

@section('content')

  @include('inc.sidebar')





    <div class='container'>
      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('ItemController@index')}}">Items</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create New Item</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('ItemController@store')}}" method="POST">

      @csrf
        <!-- Name Section -->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Item Name</label>
           <div class="col-sm-10">
             <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus/>
             @if ($errors->has('name'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
           </div>
         </div>

         <!-- Unit Section -->
         <div class="form-group row">
             <label for="unit" class="col-sm-2 col-form-label">Measurement Unit</label>
             <div class="col-sm-10">
                 <select class="custom-select {{ $errors->has('unit') ? ' is-invalid' : '' }}" id="unit" name="unit" required>
                     <option value="KG">KG</option>
                     <option value="Liter">Liter</option>
                     <option value="Quantity">Quantity</option>
                 </select>
                 @if ($errors->has('unit'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('unit') }}</strong>
                     </span>
                 @endif
             </div>
         </div>

         <!-- Supplier Section -->
         <div class="form-group row">
             <label for="supplier" class="col-sm-2 col-form-label">Supplier</label>
             <div class="col-sm-10">
                 <select class="custom-select {{ $errors->has('supplier') ? ' is-invalid' : '' }}" id="supplier" name="supplier" required>
                   @foreach($suppliers as $supplier)
                     <option value="{{$supplier->id}}">{{$supplier->name}} - {{$supplier->phone}}</option>
                    @endforeach
                 </select>
                 @if ($errors->has('supplier'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('supplier') }}</strong>
                     </span>
                 @endif
             </div>
         </div>




         <button type="submit" class="btn btn-primary">Create</button>






    </form>




  </div> <!-- Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

@endsection
