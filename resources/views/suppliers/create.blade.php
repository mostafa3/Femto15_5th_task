@extends('layouts.dashboard')


@section('title')
  <title>New Supplier</title>
@endsection

@section('content')

  @include('inc.sidebar')





    <div class='container'>
      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('SupplierController@index')}}">Suppliers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create New Supplier</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('SupplierController@store')}}" method="POST">

      @csrf
        <!-- Name Section -->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
           <div class="col-sm-10">
             <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus/>
             @if ($errors->has('name'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
           </div>
         </div>

        <!-- Email Section -->
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Supplier Email</label>
           <div class="col-sm-10">
             <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required/>
             @if ($errors->has('email'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif
           </div>
         </div>

         <!-- Phone Section -->
         <div class="form-group row">
           <label for="phone" class="col-sm-2 col-form-label">Supplier Phone</label>
            <div class="col-sm-10">
              <input type="text" id="phone" name="phone" value="{{old('phone')}}" placeholder="Phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" required/>
              @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif
            </div>
          </div>

         <!-- information Section -->
         <div class="form-group row">
           <label for="information" class="col-sm-2 col-form-label">Additional information</label>
            <div class="col-sm-10">
              <textarea id="information" name="information" value="{{old('information')}}" placeholder="information" class="form-control" ></textarea>
            </div>
          </div>




         <button type="submit" class="btn btn-primary">Create</button>






    </form>




  </div> <!-- Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

@endsection
