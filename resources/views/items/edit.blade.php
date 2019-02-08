@extends('layouts.dashboard')


@section('title')
  <title>{{$item->name}}</title>
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
          <form action="{{action('ItemController@destroy',['item'=>$item->id])}}" method="POST">
            @csrf

            <input type="hidden" name="_method" value="DELETE" />
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
              <li class="breadcrumb-item"><a href="{{action('ItemController@index')}}">Items</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('ItemController@update',['item'=>$item->id])}}" method="POST">

      @csrf
      <input type="hidden" name='_method' value="PUT"/>

      <!-- Name Section -->
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Item Name</label>
         <div class="col-sm-10">
           <input type="text" id="name" name="name" value="{{ old('name') ?? $item->name }}" placeholder="Name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required/>
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
                   <option value="KG" {{$item->unit == 'KG' ? 'selected' : ''}} >KG</option>
                   <option value="Liter" {{$item->unit == 'Liter' ? 'selected' : ''}} >Liter</option>
                   <option value="Quantity" {{$item->unit == 'Quantity' ? 'selected' : ''}} >Quantity</option>
               </select>
               @if ($errors->has('unit'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('unit') }}</strong>
                   </span>
               @endif
           </div>
       </div>




         <button type="submit" class="btn btn-primary">Update</button>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" >Delete </button>





    </form>




  </div> <!-- Container -->

@endsection
