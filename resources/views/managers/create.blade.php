@extends('layouts.dashboard')


@section('title')
  <title>New Inventory</title>
@endsection

@section('content')

  @include('inc.sidebar')





    <div class='container'>
      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('InventoryManagerController@index')}}">Inventory Managers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create New Manager</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('InventoryManagerController@store')}}" method="POST">

      @csrf
        <!-- Name Section -->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Manager Name</label>
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
          <label for="email" class="col-sm-2 col-form-label">Manager Email</label>
           <div class="col-sm-10">
             <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required/>
             @if ($errors->has('email'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif
           </div>
         </div>

        <!-- Password Section -->
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Manager Password</label>
           <div class="col-sm-10">
             <input type="password" id="password" name="password" value="" placeholder="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required/>
             @if ($errors->has('password'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('password') }}</strong>
                 </span>
             @endif
           </div>
         </div>

        <!-- password confirmation Section -->
        <div class="form-group row">
          <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
           <div class="col-sm-10">
             <input type="password" id="password_confirmation" name="password_confirmation" value="" placeholder="confirmation password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" required/>
             @if ($errors->has('password_confirmation'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('password_confirmation') }}</strong>
                 </span>
             @endif
           </div>
         </div>

         <!-- inventory Section -->
         <div class="form-group row">
             <label for="inventory" class="col-sm-2 col-form-label">Inventory</label>
             <div class="col-sm-10">
                 <select class="custom-select {{ $errors->has('inventory') ? ' is-invalid' : '' }}" id="inventory" name="inventory" required>
                   @foreach($inventories as $inventory)
                     <option value="{{$inventory->id}}">{{$inventory->name}}</option>
                    @endforeach
                 </select>
                 @if ($errors->has('inventory'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('inventory') }}</strong>
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
