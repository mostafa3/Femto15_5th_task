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
              <li class="breadcrumb-item"><a href="{{action('InventoryController@index')}}">Inventories</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create New Inventory</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('InventoryController@store')}}" method="POST">

      @csrf
        <!-- Name Section -->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Inventory Name</label>
           <div class="col-sm-10">
             <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Name" class="form-control" required autofocus/>
           </div>
         </div>

         <button type="submit" class="btn btn-primary">Create</button>






    </form>




  </div> <!-- Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

@endsection
