@extends('layouts.dashboard')


@section('title')
  <title>{{$inventory->name}}</title>
@endsection

@section('content')

  @include('inc.sidebar')


  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          This record will be permenantly deleted, Are you sure  ?
        </div>
        <div class="modal-footer">
          <form action="{{action('InventoryController@destroy',['inventory'=>$inventory->id])}}" method="POST">
            @csrf

            <input type="hidden" name="_method" value="delete" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">Close</button>
            <button type="submit" class="btn btn-danger" id="confirm-delete">Delete</button>
          </form>

        </div>
      </div>
    </div>
  </div>



    <div class='container'>

      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('InventoryController@index')}}">Inventories</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Inventory</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('InventoryController@update',['inventory'=>$inventory->id])}}" method="POST">

      @csrf
        <input type="hidden" name="_method" value="PUT" />



        <!-- Name Section -->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Inventory Name</label>
           <div class="col-sm-10">
             <input type="text" id="name" name="name" value="{{$inventory->name}}" placeholder="Name" class="form-control" required/>
           </div>
         </div>

         <button type="submit" class="btn btn-primary">Update</button>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete({{$inventory->id}})">Delete </button>





    </form>




  </div> <!-- Container -->


@endsection
